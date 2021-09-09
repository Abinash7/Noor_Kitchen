<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function Index()
    {
        $sale = Sale::whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'DESC')->paginate(5);
        return view('Backend.Report.Index')->with('sales', $sale);
    }

    public function getReport()
    {
        $sale = Sale::orderBy('id', 'DESC')->get();
        return view('Backend.Report.List')->with('sales', $sale);
    }

    public function getReportByID($id)
    {
        $detail = SaleDetail::with('sale')->where('sale_id', $id)->get();
        // return $detail;
        return view('Backend.Report.show')->with('details', $detail);
    }

    public function individualReport()
    {
        $sale = Sale::whereDate('created_at', Carbon::today())
            ->where('user_id', '=', auth()->user()->id)
            ->orderBy('created_at', 'DESC')->paginate(5);
        return view('Backend.Report.Individual')->with('sales', $sale);
    }

    public function reportHistory()
    {
        if (isset($_GET['query'])) {
            $search_text = $_GET['query'];
            $sale = Sale::where('vehicle_number', 'LIKE', '%' . $search_text . '%')
                ->orwhere('id', 'LIKE', '%' . $search_text . '%')
                ->orwhere('updated_at','LIKE', '%' . $search_text . '%')
                ->orderBy('created_at', 'DESC')->paginate(5);
            return view('Backend.Report.History')->with('sales', $sale);
        } else {
            $sale = Sale::orderBy('created_at', 'DESC')->paginate(5);
            return view('Backend.Report.History')->with('sales', $sale);
        }
    }

    public function editSoldProduct($productId)
    {
        $sold_item = SaleDetail::findorfail($productId);
        return view('Backend.Report.Edit')->with('sales', $sold_item);
    }

    // Updating if receipt is already printed but the customer withdraws few stock
    public function updateSoldProduct(Request $request, $productId)
    {
        $sold_item = SaleDetail::findorfail($productId);
        $update_stock = Stock::findorfail($sold_item->product_id);
        if ($request->quantity < $sold_item->quantity) {
            $returned_quantity = $sold_item->quantity - $request->quantity;
        } else {
            $returned_quantity = $request->quantity - $sold_item->quantity;
        }
        $update_stock->quantity = $update_stock->quantity + $returned_quantity;

        $update_stock->save();

        $sold_item->update($this->updateSoldDetailsValidation($request->id));
        return redirect('/admin/report')->with('message', "Product Updated Successfully From Receipt !!!");
    }

    // Updating if receipt is already printed but the customer withdraws few stock
    public function deleteSoldProduct($productId)
    {
        $sold_item = SaleDetail::findorfail($productId);
        $update_stock = Stock::findorfail($sold_item->product_id);
        $update_stock->quantity = $update_stock->quantity + $sold_item->quantity;
        $update_stock->save();
        $sold_item->delete();
        return redirect('/admin/report')->with('message', "Product Deleted Successfully From Receipt !!!");
    }

    public function updateSoldDetailsValidation()
    {
        return request()->validate([
            'quantity' => 'required|Integer'
        ]);
    }
}
