<?php
namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // عرض تقرير المبيعات
    public function salesReport()
    {
        // استعلام للحصول على مبيعات كل منتج مع حساب الكمية المباعة والعائدات
        $salesReport = Sales::select('product_id', \DB::raw('SUM(quantity) as total_sold'), \DB::raw('SUM(total_price) as total_revenue'))
            ->groupBy('product_id')
            ->with('product')  // تحميل المنتج المرتبط بكل بيع
            ->get();

        return view('admin.reports.sales', compact('salesReport'));
    }

    // عرض تقرير المخزون
    public function stockReport()
    {
        // استعراض المنتجات مع المخزون
        $products = Product::with('stocks')->get();

        
    
        return view('admin.reports.stock', compact('products'));
    }

    // عرض تقرير الأرباح
    public function profitsReport()
    {
        // حساب إجمالي المبيعات وإجمالي المشتريات
        $totalSales = Sales::sum('total_price');
        $totalPurchases = Purchase::sum('price');
        $profit = $totalSales - $totalPurchases;

        // تمرير البيانات إلى الـ View
        return view('admin.reports.profits', compact('totalSales', 'totalPurchases', 'profit'));
    }
}
