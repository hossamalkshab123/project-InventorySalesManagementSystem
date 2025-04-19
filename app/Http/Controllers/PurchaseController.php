<?php
namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // عرض قائمة المشتريات
    public function index()
    {
        $purchases = Purchase::with('product', 'supplier')->get();
        return view('admin.purchases.index', compact('purchases'));
    }

    // عرض نموذج إنشاء عملية شراء جديدة
    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('admin.purchases.create', compact('products', 'suppliers'));
    }

    // حفظ عملية شراء جديدة في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        Purchase::create($request->all());

        return redirect()->route('purchases.index')->with('success', __('messages.purchase_created'));
    }

    // عرض بيانات عملية شراء للتعديل
    public function edit(Purchase $purchase)
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('admin.purchases.edit', compact('purchase', 'products', 'suppliers'));
    }

    // تحديث بيانات عملية شراء في قاعدة البيانات
    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $purchase->update($request->all());

        return redirect()->route('purchases.index')->with('success', __('messages.purchase_updated'));
    }

    // حذف عملية شراء من قاعدة البيانات
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->route('purchases.index')->with('success', __('messages.purchase_deleted'));
    }
}