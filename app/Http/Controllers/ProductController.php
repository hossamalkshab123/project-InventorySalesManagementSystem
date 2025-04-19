<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('supplier')->get();
        return view('admin.products.index', compact('products'));
        
    }
    public function dashboard()
{
    $totalProducts = Product::count(); // حساب عدد المنتجات

    return view('dashboard', compact('totalProducts')); // إرسال المتغير للعرض
}

    public function create()
    {
        $suppliers = Supplier::all();
        return view('admin.products.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category' => 'required',
            'supplier_id' => 'required|exists:suppliers,id'
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $suppliers = Supplier::all();
        return view('admin.products.edit', compact('product', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category' => 'required',
            'supplier_id' => 'required|exists:suppliers,id'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}