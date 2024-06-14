<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Xử lý request đến.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            //Kiểm tra xem người dùng có vai trò nào không
            if ($user->roles()->exists()) {
                return $next($request);
            }
        }
        //Nếu không phải admin, chuyển hướng về trang chủ
        return redirect('/')->with('error', 'Access Denied');
        // if (!Auth::check() || !Auth::user()->hasRole('admin')) {
        //     return redirect('/home');
        // }
        // return $next($request);
    }
}
