<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $client = Client::all();
        return view('Backend.Cashier.Index')->with('categories', $category)->with('clients', $client);
    }

    public function getCustomerDetail($customer_id)
    {
        $client = Client::findorfail($customer_id);
        return response()->json($client);
    }

    public function orderProduct(Request $request)
    {
        $product = Stock::findorfail($request->product_id);
        // Sales Info
        $sale = Sale::where('sale_status', 'unpaid')->first();
        if (!$sale) {
            $sale = new Sale();
            $sale->user_id = auth()->user()->id;
            $sale->user_name = auth()->user()->full_name;
            $sale->vehicle_number = auth()->user()->vehicle_number;
            $sale->save();
            $sale_id = $sale->id;
        } else {
            $sale_id = $sale->id;
        }
        //Sales Details
        $sale_detail = new SaleDetail();
        $sale_detail->sale_id = $sale_id;
        $sale_detail->product_id = $product->id;
        $sale_detail->product_name = $product->product_name;
        $sale_detail->product_price = $request->price;
        $sale_detail->quantity  = $request->quantity;
        $sale_detail->save();

        //Total Price update in sales
        $sale->total_price = $sale->total_price + ($request->quantity * $request->price);
        $sale->save();

        $html = $this->getAllDetails($sale_id);

        return $html;
    }

    private function getAllDetails($sale_id)
    {
        //List all Sale Details
        $html = '<p>Sale ID: ' . $sale_id . '</p>';
        $saleDetails  = SaleDetail::where('sale_id', $sale_id)->get();
        $html .= '<div class="table-responsive-md" style="overflow-y:scroll; height: 400px; border: 1px solid #343A40;">
        <table class="table table-stripped table-dark">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>';
        $showBtnPayment = true;
        foreach ($saleDetails as $key => $saleDetail) {
            $html .= '
                <tr>
                    <td>' . ($key + 1) . '</td>
                    <td>' . $saleDetail->product_name . '</td>
                    <td>' . $saleDetail->quantity . '</td>
                    <td>' . $saleDetail->product_price . '</td>
                    <td>' . ($saleDetail->product_price * $saleDetail->quantity) . '</td>';
            if ($saleDetail->status == "notConfirmed") {
                $showBtnPayment = false;
                $html .= '<td><a data-id="' . $saleDetail->id . '" class="btn btn-danger btn-delete-saledetail"><i class="fa fa-trash"></i></a></td>';
            } else {
                $html .= '<td><i class = "fa fa-check-circle"></i></td>';
            }

            $html .= '</tr>';
        }
        $html .= '</tbody></table></div>';

        $sale = Sale::findorfail($sale_id);
        $html .= '<hr/>';
        $html .= '<h3>Total Amount : Rs.' . number_format($sale->total_price) . '</h3>';
        $html .= '<hr/>';
        if ($showBtnPayment) {
            $html .= '<div>
            <button data-id=' . $sale_id . ' class="btn btn-success btn-block btn-payment" data-totalAmount="' . $sale->total_price . '" data-toggle="modal" data-target="#exampleModal" style="width:100%;"> Payment </button>
        </div>';
        } else {
            $html .= '<div>
            <button data-id=' . $sale_id . ' class="btn btn-warning btn-block btn-confirm-order" style="width:100%;"> Confirm Order </button>
        </div>';
        }
        return $html;
    }


    public function confirmOrder(Request $request)
    {
        $sale_id = $request->sale_id;
        $saleDetails  = SaleDetail::where('sale_id', $sale_id)->update(['status' => 'confirmed']);
        $html = $this->getAllDetails($sale_id);
        return $html;
    }

    public function savePayment(Request $request)
    {
        $saleID = $request->sale_id;

        //decrease quantity of products
        $sale_detail = SaleDetail::where('sale_id', '=', $saleID)->get();
        foreach ($sale_detail as $sales) {
            $product = Stock::findorfail($sales->product_id);
            $product_quantity = $product->quantity - $sales->quantity;
            $product->quantity = $product_quantity;
            $product->save();
        }
        $sale = Sale::findorfail($saleID);
        $sale->customer_id = $request->customer_id;
        $sale->total_received = $request->received_amount;
        $sale->change = ($request->received_amount - $sale->total_price);
        $sale->payment_type = $request->payment_type;
        if ($sale->total_received <= ($sale->total_price - 20)) {
            $sale->sale_status = "credit";
        } else {
            $sale->sale_status = "paid";
        }
        $sale->save();
        return "/admin/cashier/showReceipt/" . $saleID;
    }

    public function showReceipt($saleID)
    {
        $sale = Sale::with('customer')->findorfail($saleID);
        $saleDetails = SaleDetail::where('sale_id', $saleID)->get();
        $user = User::findorfail($sale->user_id);
        return view('Backend.Cashier.Receipt')->with('sales', $sale)->with('saleDetails', $saleDetails)->with('user', $user);
    }

    public function deleteDetail(Request $request)
    {
        $saleDetailID = $request->saleDetailID;
        $saleDetail = SaleDetail::findorfail($saleDetailID);
        $deduct_price = ($saleDetail->product_price * $saleDetail->quantity);
        $saleDetail->delete();

        //update price
        $sale = Sale::findorfail($saleDetail->sale_id);
        $sale->total_price = $sale->total_price - $deduct_price;
        $sale->save();

        $sale_detail = SaleDetail::where('sale_id', $saleDetail->sale_id)->first();
        if ($saleDetail) {
            $html = $this->getAllDetails($saleDetail->sale_id);
        } else {
            $html = "No record found";
        }
        return $html;
    }

    public function getMenuByCategory($category_id)
    {
        $product = Stock::where('category_id', $category_id)->get();
        $html = '';
        foreach ($product as $prod) {
            if ($prod->quantity > 0) {
                $html .= '
            <div class="col-md-3 col-sm-3 text-center">
            <a class="btn btn-outline-secondary btn-menu" data-id="' . $prod->id . '" data-toggle="modal" data-target="#priceModal" style="width:100%;" >
            ' . $prod->product_name . '
            </br>
            Rs. ' . number_format($prod->rate) . '
            </br>
             Quantity ' . number_format($prod->quantity) . '
            </a>
            </div> 
            ';
            }
        }
        return $html;
    }
}
