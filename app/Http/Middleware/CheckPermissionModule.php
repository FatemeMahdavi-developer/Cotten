<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissionModule
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // گرفتن کاربر لاگین کرده
        $user = Auth::user();

        // // بررسی نقش کاربر
        // if ($user->role_id !== $role) {
        //     // در صورتی که نقش کاربر منطبق نباشد، می‌توانید به صفحه‌ای دیگر هدایت کنید
        //     // یا یک پاسخ 403 بدهید
        //     return response('Unauthorized.', 403);
        // }
        return $next($request);
    }
}
