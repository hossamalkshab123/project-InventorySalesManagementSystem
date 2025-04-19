<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::with('product', 'customer')->get();
        return view('admin.sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('admin.sales.create', compact('products', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'quantity' => 'required|numeric|min:1',
            'total_price' => 'required|numeric|min:0'
        ]);

        Sales::create($request->all());

        return redirect()->route('sales.index')->with('success', __('messages.sale_created'));
    }

    public function edit(Sales $sale)
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('admin.sales.edit', compact('sale', 'products', 'customers'));
    }

    public function update(Request $request, Sales $sale)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'quantity' => 'required|numeric|min:1',
            'total_price' => 'required|numeric|min:0'
        ]);

        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', __('messages.sale_updated'));
    }

    public function destroy(Sales $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', __('messages.sale_deleted'));
    }
}