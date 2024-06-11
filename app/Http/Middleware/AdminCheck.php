<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::check()) {
        //     $userId = Auth::user()->user_id;
            
            // Kiểm tra xem người dùng có trong bảng admin hay không
        //     $isAdmin = Admin::where('user_id', $userId)->exists();
        //     if ($isAdmin) {
                return $next($request);
        //     }
        // }
        // Nếu không phải admin, chuyển hướng về trang chủ
        // return redirect('/');
    }
    
    
}
