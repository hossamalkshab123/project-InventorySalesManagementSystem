<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // عرض قائمة العملاء
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    // عرض نموذج إنشاء عميل جديد
    public function create()
    {
        return view('admin.customers.create');
    }

    // حفظ عميل جديد في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:20',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', __('messages.customer_created'));
    }

    // عرض بيانات عميل للتعديل
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    // تحديث بيانات عميل في قاعدة البيانات
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:20',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', __('messages.customer_updated'));
    }

    // حذف عميل من قاعدة البيانات
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', __('messages.customer_deleted'));
    }
}
