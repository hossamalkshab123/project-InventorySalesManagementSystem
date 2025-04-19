<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sales;
use App\Models\Customer;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalProducts = Product::count(); // إجمالي عدد المنتجات
        $totalSales = Sales::count(); // إجمالي عدد المبيعات
        $totalCustomers = Customer::count(); // إجمالي عدد العملاء

        return view('admin.dashboard', compact('totalProducts', 'totalSales', 'totalCustomers'));
    }
}
