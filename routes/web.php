<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChuongtrinhdaotaoController;
use App\Http\Controllers\HocphanController;
use App\Http\Controllers\CtdtHocphanController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//user 
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

//khoa
Route::get('/khoa', [App\Http\Controllers\KhoaController::class, 'index'])->name('khoa.index');
Route::get('/khoa/create', [App\Http\Controllers\KhoaController::class, 'create'])->name('khoa.create');
Route::post('/khoa', [App\Http\Controllers\KhoaController::class, 'store'])->name('khoa.store');
Route::get('/khoa/{id}/edit', [App\Http\Controllers\KhoaController::class, 'edit'])->name('khoa.edit');
Route::put('/khoa/{id}', [App\Http\Controllers\KhoaController::class, 'update'])->name('khoa.update');
Route::delete('/khoa/{id}', [App\Http\Controllers\KhoaController::class, 'destroy'])->name('khoa.destroy');

//bomon
Route::get('/bomon', [App\Http\Controllers\BomonController::class, 'index'])->name('bomon.index');
Route::get('/bomon/create', [App\Http\Controllers\BomonController::class, 'create'])->name('bomon.create');
Route::post('/bomon', [App\Http\Controllers\BomonController::class, 'store'])->name('bomon.store');
Route::get('/bomon/{id}/edit', [App\Http\Controllers\BomonController::class, 'edit'])->name('bomon.edit');
Route::put('/bomon/{id}', [App\Http\Controllers\BomonController::class, 'update'])->name('bomon.update');
Route::delete('/bomon/{id}', [App\Http\Controllers\BomonController::class, 'destroy'])->name('bomon.destroy');

//nganhhoc
Route::get('/nganhhoc', [App\Http\Controllers\NganhhocController::class, 'index'])->name('nganhhoc.index');
Route::get('/nganhhoc/create', [App\Http\Controllers\NganhhocController::class, 'create'])->name('nganhhoc.create');
Route::post('/nganhhoc', [App\Http\Controllers\NganhhocController::class, 'store'])->name('nganhhoc.store');
Route::get('/nganhhoc/{id}/edit', [App\Http\Controllers\NganhhocController::class, 'edit'])->name('nganhhoc.edit');
Route::put('/nganhhoc/{id}', [App\Http\Controllers\NganhhocController::class, 'update'])->name('nganhhoc.update');
Route::delete('/nganhhoc/{id}', [App\Http\Controllers\NganhhocController::class, 'destroy'])->name('nganhhoc.destroy');

//khoikienthuc
Route::get('/khoikienthuc', [App\Http\Controllers\KhoikienthucController::class, 'index'])->name('khoikienthuc.index');
Route::get('/khoikienthuc/create', [App\Http\Controllers\KhoikienthucController::class, 'create'])->name('khoikienthuc.create');
Route::post('/khoikienthuc', [App\Http\Controllers\KhoikienthucController::class, 'store'])->name('khoikienthuc.store');
Route::get('/khoikienthuc/{id}/edit', [App\Http\Controllers\KhoikienthucController::class, 'edit'])->name('khoikienthuc.edit');
Route::put('/khoikienthuc/{id}', [App\Http\Controllers\KhoikienthucController::class, 'update'])->name('khoikienthuc.update');
Route::delete('/khoikienthuc/{id}', [App\Http\Controllers\KhoikienthucController::class, 'destroy'])->name('khoikienthuc.destroy');

//loaihocphan
Route::get('/loaihocphan', [App\Http\Controllers\LoaihocphanController::class, 'index'])->name('loaihocphan.index');
Route::get('/loaihocphan/create', [App\Http\Controllers\LoaihocphanController::class, 'create'])->name('loaihocphan.create');
Route::post('/loaihocphan', [App\Http\Controllers\LoaihocphanController::class, 'store'])->name('loaihocphan.store');
Route::get('/loaihocphan/{id}/edit', [App\Http\Controllers\LoaihocphanController::class, 'edit'])->name('loaihocphan.edit');
Route::put('/loaihocphan/{id}', [App\Http\Controllers\LoaihocphanController::class, 'update'])->name('loaihocphan.update');
Route::delete('/loaihocphan/{id}', [App\Http\Controllers\LoaihocphanController::class, 'destroy'])->name('loaihocphan.destroy');

//hocphan
Route::get('/hocphan', [HocphanController::class, 'index'])->name('hocphan.index');
Route::get('/hocphan/create', [HocphanController::class, 'create'])->name('hocphan.create');
Route::post('/hocphan', [HocphanController::class, 'store'])->name('hocphan.store');
Route::get('/hocphan/{id}/edit', [HocphanController::class, 'edit'])->name('hocphan.edit');
Route::put('/hocphan/{id}', [HocphanController::class, 'update'])->name('hocphan.update');
Route::delete('/hocphan/{id}', [HocphanController::class, 'destroy'])->name('hocphan.destroy');

//chuongtrinhdaotao
Route::get('/chuongtrinhdaotao', [ChuongtrinhdaotaoController::class, 'index'])->name('chuongtrinhdaotao.index');
Route::get('/chuongtrinhdaotao/create', [ChuongtrinhdaotaoController::class, 'create'])->name('chuongtrinhdaotao.create');
Route::post('/chuongtrinhdaotao', [ChuongtrinhdaotaoController::class, 'store'])->name('chuongtrinhdaotao.store');
Route::get('/chuongtrinhdaotao/{id}', [ChuongtrinhdaotaoController::class, 'show'])->name('chuongtrinhdaotao.show');
Route::get('/chuongtrinhdaotao/{id}/edit', [ChuongtrinhdaotaoController::class, 'edit'])->name('chuongtrinhdaotao.edit');
Route::put('/chuongtrinhdaotao/{id}', [ChuongtrinhdaotaoController::class, 'update'])->name('chuongtrinhdaotao.update');
Route::delete('/chuongtrinhdaotao/{id}', [ChuongtrinhdaotaoController::class, 'destroy'])->name('chuongtrinhdaotao.destroy');
Route::get('/chuongtrinhdaotao/{id}/showhocky', [ChuongtrinhdaotaoController::class, 'showhocky'])->name('chuongtrinhdaotao.showhocky'); 

//ctdthocphan
Route::get('/ctdthocphan', [CtdtHocphanController::class, 'index'])->name('ctdthocphan.index');
Route::get('/ctdthocphan/create', [CtdtHocphanController::class, 'create'])->name('ctdthocphan.create');
Route::post('/ctdthocphan', [CtdtHocphanController::class, 'store'])->name('ctdthocphan.store');
Route::get('/ctdthocphan/{id}/edit', [CtdtHocphanController::class, 'edit'])->name('ctdthocphan.edit');
Route::put('/ctdthocphan/{id}', [CtdtHocphanController::class, 'update'])->name('ctdthocphan.update');
Route::delete('/ctdthocphan/{id}', [CtdtHocphanController::class, 'destroy'])->name('ctdthocphan.destroy');










