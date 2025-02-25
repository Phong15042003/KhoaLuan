<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // Kiểm tra xem user đã đăng nhập hay chưa và có vai trò admin không
       if (Auth::check() && Auth::user()->vaitro === 'admin') {
        // Nếu đúng, cho phép đi tiếp
        return $next($request);
    }

    // Nếu không phải admin, trả về trang lỗi 403 hoặc chuyển hướng
    abort(403, 'Bạn không có quyền truy cập trang này.');
    }
}
