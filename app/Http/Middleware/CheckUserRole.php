<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // إذا كان المستخدم إدمن، اسمح له بالوصول إلى جميع المسارات
        if (auth()->user()->hasRole('admin')) {
            return $next($request);
        }

        // إذا لم يكن المستخدم إدمن، تحقق من الدور المطلوب
        if (!auth()->user()->hasRole($role)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}