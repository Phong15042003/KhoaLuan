<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Hocphan;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
        $soMonChuaCoDeCuong = 0;

        if (Auth::check() && Auth::user()->vaitro === 'giangvien') {
            $user = Auth::user();

            // Lấy các học phần được phân công
            $hocphans = Hocphan::whereHas('phancongmonhocs', function ($query) use ($user) {
                $query->where('giangvien_id', $user->id);
            })->get();

            // Đếm số môn chưa có đề cương
            $soMonChuaCoDeCuong = $hocphans->filter(function ($hp) {
                return $hp->decuongchitiets->count() == 0;
            })->count();
        }

        $view->with('soMonChuaCoDeCuong', $soMonChuaCoDeCuong);
    });
    }
}
