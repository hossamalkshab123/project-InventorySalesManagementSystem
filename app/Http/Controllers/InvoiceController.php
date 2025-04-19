<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Sales;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // عرض قائمة الفواتير
    public function index()
    {
        $invoices = Invoice::with('sale')->get();
        return view('admin.invoices.index', compact('invoices'));
    }
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id); // جلب الفاتورة بناءً على المعرف
        return view('admin.invoices.show', compact('invoice')); // عرض التفاصيل في صفحة show
    }

    // عرض نموذج إنشاء فاتورة جديدة
    public function create()
    {
        $sales = Sales::all();
        return view('admin.invoices.create', compact('sales'));
    }

    // حفظ فاتورة جديدة في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'invoice_number' => 'required|unique:invoices,invoice_number',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:paid,unpaid',
        ]);

        Invoice::create($request->all());

        return redirect()->route('invoices.index')->with('success', __('messages.invoice_created'));
    }

    // عرض بيانات فاتورة للتعديل
    public function edit(Invoice $invoice)
    {
        $sales = Sales::all();
        return view('admin.invoices.edit', compact('invoice', 'sales'));
    }

    // تحديث بيانات فاتورة في قاعدة البيانات
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'invoice_number' => 'required|unique:invoices,invoice_number,' . $invoice->id,
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:paid,unpaid',
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoices.index')->with('success', __('messages.invoice_updated'));
    }

    // حذف فاتورة من قاعدة البيانات
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', __('messages.invoice_deleted'));
    }
}