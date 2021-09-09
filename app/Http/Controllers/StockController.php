<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        if (isset($_GET['query'])) {
            $search_text = $_GET['query'];
            $stock = Stock::with('category')->where('product_name', 'LIKE', '%' . $search_text . '%')
                ->orWhere('product_brand', 'LIKE', '%' . $search_text . '%')->orderby('id', 'DESC')->paginate(5);
            return view('Backend.Stock.list')->with('stocks', $stock);
        } else {
            $stock = Stock::with('category')->orderby('id', 'DESC')->paginate(5);
            return view('Backend.Stock.list')->with('stocks', $stock);
        }
    }

    public function create()
    {
        $category = Category::all();
        return view('Backend.Stock.create')->with('categories', $category);
    }

    public function store(Request $request)
    {
        // return $request->all();
        Stock::create($this->stockValidation($request->all()));
        return redirect()->route('stock.index')->with('message', 'Product Added Successfully !!!');
    }

    public function edit(Stock $stock)
    {
        return view('Backend.Stock.edit')->with('stocks', $stock);
    }

    public function update(Request $request, Stock $stock)
    {
        $stock->update($this->stockUpdateValidation($stock->id));
        return redirect()->route('stock.index');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stock.index');
    }

    public function editStock($id)
    {
        $stock = Stock::findorfail($id);
        return view('Backend.Stock.add')->with('stocks', $stock);
    }

    public function addStock($id, Request $request)
    {
        $stock = Stock::findorfail($id);
        $stock->quantity = $stock->quantity + $request->quantity;
        $stock->damaged_piece = $stock->damaged_piece + $request->damaged_piece;
        $stock->rate = $request->rate;
        $stock->save();
        return redirect()->route('stock.index');
    }

    private function stockValidation()
    {
        return request()->validate([
            'product_name' => 'required|string',
            'product_brand' => 'required|string',
            'quantity' => 'required|integer',
            'rate' => 'required|numeric',
            'category_id' => 'required',
            'damaged_piece'=>'sometimes|nullable'
        ]);
    }

    private function stockUpdateValidation()
    {
        return request()->validate([
            'product_name' => 'required|string',
            'product_brand' => 'required|string',
            'quantity' => 'required|integer',
            'rate' => 'required|numeric',
            'damaged_piece'=>'sometimes|nullable'
        ]);
    }
}
