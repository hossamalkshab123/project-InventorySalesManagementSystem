<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // إنشاء الأدوار
        $adminRole = Role::create(['name' => 'admin']);
        $inventoryManagerRole = Role::create(['name' => 'inventory_manager']);
        $accountantRole = Role::create(['name' => 'accountant']);

        // إنشاء الصلاحيات
        $manageProducts = Permission::create(['name' => 'manage products']);
        $manageSales = Permission::create(['name' => 'manage sales']);
        $managePurchases = Permission::create(['name' => 'manage purchases']);
        $manageInvoices = Permission::create(['name' => 'manage invoices']);
        $manageCustomers = Permission::create(['name' => 'manage customers']);
        $manageSuppliers = Permission::create(['name' => 'manage suppliers']);

        // تعيين الصلاحيات للأدوار
        $adminRole->givePermissionTo([$manageProducts, $manageSales, $managePurchases, $manageInvoices, $manageCustomers, $manageSuppliers]);
        $inventoryManagerRole->givePermissionTo([$manageProducts, $managePurchases]);
        $accountantRole->givePermissionTo([$manageSales, $manageInvoices]);
    }
}
