<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// تغيير اللغة
Route::get('locale/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'ar'])) {
        session(['locale' => $lang]);
        App::setLocale($lang);
    }
    return redirect()->back();
})->name('locale');

// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
});

// مسارات المصادقة (تسجيل الدخول، تسجيل مستخدم جديد، إلخ)
Auth::routes(['register' => false]);



// مسارات لوحة التحكم (Dashboard) - تتطلب تسجيل الدخول
Route::middleware('auth')->group(function () {
    // الصفحة الرئيسية للوحة التحكم
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // ملف المستخدم الشخصي
    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // تحديث الملف الشخصي
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // مسارات الإدارة (الإدمن لديه حق الوصول إلى جميع المسارات)
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class); // إدارة المستخدمين
        Route::resource('products', ProductController::class); // إدارة المنتجات
        Route::resource('suppliers', SupplierController::class); // إدارة الموردين
        Route::resource('purchases', PurchaseController::class); // إدارة المشتريات
        Route::resource('customers', CustomerController::class); // إدارة العملاء
        Route::resource('sales', SalesController::class); // إدارة المبيعات
        Route::resource('invoices', InvoiceController::class); // إدارة الفواتير
        Route::prefix('reports')->group(function () {
            Route::get('/sales', [ReportController::class, 'salesReport'])->name('reports.sales');
            Route::get('/stock', [ReportController::class, 'stockReport'])->name('reports.stock');
            Route::get('/profits', [ReportController::class, 'profitsReport'])->name('reports.profits');
        });
    });

    // مسارات مدير المخزون (تتطلب دور "inventory_manager")
    Route::middleware('role:inventory_manager')->group(function () {
        Route::resource('products', ProductController::class); // إدارة المنتجات
        Route::resource('suppliers', SupplierController::class); // إدارة الموردين
        Route::resource('purchases', PurchaseController::class); // إدارة المشتريات
    });

    // مسارات المحاسب (تتطلب دور "accountant")
    Route::middleware('role:accountant')->group(function () {
        Route::resource('customers', CustomerController::class); // إدارة العملاء
        Route::resource('sales', SalesController::class); // إدارة المبيعات
        Route::resource('invoices', InvoiceController::class); // إدارة الفواتير
        Route::prefix('reports')->group(function () {
            Route::get('/sales', [ReportController::class, 'salesReport'])->name('reports.sales');
            Route::get('/stock', [ReportController::class, 'stockReport'])->name('reports.stock');
            Route::get('/profits', [ReportController::class, 'profitsReport'])->name('reports.profits');
        });
    });
});