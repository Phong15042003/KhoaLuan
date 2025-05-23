<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KhoaController;
use App\Http\Controllers\BomonController;
use App\Http\Controllers\ChuongtrinhdaotaoController;
use App\Http\Controllers\HocphanController;
use App\Http\Controllers\CtdtHocphanController;
use App\Http\Controllers\DecuongchitietController;
use App\Http\Controllers\NganhhocController;
use App\Http\Controllers\KhoikienthucController;
use App\Http\Controllers\LoaihocphanController;
use App\Http\Controllers\phancongmonhocController;
use App\Http\Controllers\ChuandauraController;
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
Route::get('/information', [App\Http\Controllers\InformationController::class, 'index'])->name('information');

//user 
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/excel', [UserController::class, 'excelForm'])->name('users.excel');
Route::post('/users/import', [UserController::class, 'import'])->name('users.import');

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
Route::get('/hocphan/excel', [HocphanController::class, 'excel'])->name('hocphan.excel');
Route::post('/hocphan/import', [HocphanController::class, 'import'])->name('hocphan.import');

//chuongtrinhdaotao
Route::get('/chuongtrinhdaotao', [ChuongtrinhdaotaoController::class, 'index'])->name('chuongtrinhdaotao.index');
Route::get('/chuongtrinhdaotao/create', [ChuongtrinhdaotaoController::class, 'create'])->name('chuongtrinhdaotao.create');
Route::post('/chuongtrinhdaotao', [ChuongtrinhdaotaoController::class, 'store'])->name('chuongtrinhdaotao.store');
Route::get('/chuongtrinhdaotao/{id}', [ChuongtrinhdaotaoController::class, 'show'])->name('chuongtrinhdaotao.show');
Route::get('/chuongtrinhdaotao/{id}/edit', [ChuongtrinhdaotaoController::class, 'edit'])->name('chuongtrinhdaotao.edit');
Route::put('/chuongtrinhdaotao/{id}', [ChuongtrinhdaotaoController::class, 'update'])->name('chuongtrinhdaotao.update');
Route::delete('/chuongtrinhdaotao/{id}', [ChuongtrinhdaotaoController::class, 'destroy'])->name('chuongtrinhdaotao.destroy');
Route::get('/chuongtrinhdaotao/{id}/showhocky', [ChuongtrinhdaotaoController::class, 'showhocky'])->name('chuongtrinhdaotao.showhocky'); 
Route::get('chuongtrinhdaotao/{id}/showkhoikienthuc', [ChuongtrinhdaotaoController::class, 'showKhoikienthuc'])->name('chuongtrinhdaotao.showkhoikienthuc');
Route::get('chuongtrinhdaotao/{id}/showloaihocphan', [ChuongtrinhdaotaoController::class, 'showLoaihocphan'])->name('chuongtrinhdaotao.showloaihocphan');
Route::get('chuongtrinhdaotao/{id}/changed-courses', [ChuongtrinhdaotaoController::class, 'showChangedCourses'])->name('chuongtrinhdaotao.changed-courses');
Route::get('/chuongtrinhdaotao/pdf/{id}', [ChuongtrinhdaotaoController::class, 'pdf'])->name('chuongtrinhdaotao.pdf');


//ctdthocphan
Route::get('/ctdthocphan', [CtdtHocphanController::class, 'index'])->name('ctdthocphan.index');
Route::get('/ctdthocphan/create', [CtdtHocphanController::class, 'create'])->name('ctdthocphan.create');
Route::post('/ctdthocphan', [CtdtHocphanController::class, 'store'])->name('ctdthocphan.store');
Route::get('/ctdthocphan/{id}/edit', [CtdtHocphanController::class, 'edit'])->name('ctdthocphan.edit');
Route::put('/ctdthocphan/{id}', [CtdtHocphanController::class, 'update'])->name('ctdthocphan.update');
Route::delete('/ctdthocphan/{id}', [CtdtHocphanController::class, 'destroy'])->name('ctdthocphan.destroy');
Route::get('/ctdthocphan/get-available-hocphans', [CtdtHocphanController::class, 'getAvailableHocphans'])->name('ctdthocphan.get-available-hocphans');
Route::get('/get-hocphans/{ctdt_id}', [CtdtHocphanController::class, 'getHocphans'])->name('get-hocphans');



//vaitro
Route::get('/vaitro', [App\Http\Controllers\VaitroController::class, 'index'])->name('vaitro.index');
Route::get('/vaitro/create', [App\Http\Controllers\VaitroController::class, 'create'])->name('vaitro.create');
Route::post('/vaitro', [App\Http\Controllers\VaitroController::class, 'store'])->name('vaitro.store');
Route::get('/vaitro/{id}/edit', [App\Http\Controllers\VaitroController::class, 'edit'])->name('vaitro.edit');
Route::put('/vaitro/{id}', [App\Http\Controllers\VaitroController::class, 'update'])->name('vaitro.update');
Route::delete('/vaitro/{id}', [App\Http\Controllers\VaitroController::class, 'destroy'])->name('vaitro.destroy');
Route::get('/vaitro/{id}', [App\Http\Controllers\VaitroController::class, 'show'])->name('vaitro.show');

//khoahoc
Route::get('/khoahoc', [App\Http\Controllers\KhoahocController::class, 'index'])->name('khoahoc.index');
Route::get('/khoahoc/create', [App\Http\Controllers\KhoahocController::class, 'create'])->name('khoahoc.create');
Route::post('/khoahoc', [App\Http\Controllers\KhoahocController::class, 'store'])->name('khoahoc.store');
Route::get('/khoahoc/{id}/edit', [App\Http\Controllers\KhoahocController::class, 'edit'])->name('khoahoc.edit');
Route::put('/khoahoc/{id}', [App\Http\Controllers\KhoahocController::class, 'update'])->name('khoahoc.update');
Route::delete('/khoahoc/{id}', [App\Http\Controllers\KhoahocController::class, 'destroy'])->name('khoahoc.destroy');
Route::get('/khoahoc/{id}', [App\Http\Controllers\KhoahocController::class, 'show'])->name('khoahoc.show');

//decuongchitiet
Route::get('/decuongchitiet', [App\Http\Controllers\DecuongchitietController::class, 'index'])->name('decuongchitiet.index');
Route::get('/decuongchitiet/create', [App\Http\Controllers\DecuongchitietController::class, 'create'])->name('decuongchitiet.create');
Route::post('/decuongchitiet', [App\Http\Controllers\DecuongchitietController::class, 'store'])->name('decuongchitiet.store');
Route::get('/decuongchitiet/{id}/edit', [App\Http\Controllers\DecuongchitietController::class, 'edit'])->name('decuongchitiet.edit');
Route::put('/decuongchitiet/{id}', [App\Http\Controllers\DecuongchitietController::class, 'update'])->name('decuongchitiet.update');
Route::delete('/decuongchitiet/{id}', [App\Http\Controllers\DecuongchitietController::class, 'destroy'])->name('decuongchitiet.destroy');
Route::get('/decuongchitiet/{id}', [App\Http\Controllers\DecuongchitietController::class, 'show'])->name('decuongchitiet.show');
Route::get('/decuongchitiet/{id}/export-pdf', [DecuongchitietController::class, 'exportPDF'])->name('decuongchitiet.exportPDF');

//phancongmonhoc
Route::get('/phancongmonhoc', [App\Http\Controllers\PhancongmonhocController::class, 'index'])->name('phancongmonhoc.index');
Route::get('/phancongmonhoc/create', [App\Http\Controllers\PhancongmonhocController::class, 'create'])->name('phancongmonhoc.create');
Route::post('/phancongmonhoc', [App\Http\Controllers\PhancongmonhocController::class, 'store'])->name('phancongmonhoc.store');
Route::get('/phancongmonhoc/{id}/edit', [App\Http\Controllers\PhancongmonhocController::class, 'edit'])->name('phancongmonhoc.edit');
Route::put('/phancongmonhoc/{id}', [App\Http\Controllers\PhancongmonhocController::class, 'update'])->name('phancongmonhoc.update');
Route::get('/phancongmonhoc/{id}', [App\Http\Controllers\PhancongmonhocController::class, 'show'])->name('phancongmonhoc.show');
Route::delete('/phancongmonhoc/{id}', [App\Http\Controllers\PhancongmonhocController::class, 'destroy'])->name('phancongmonhoc.destroy');

//chuandaura
Route::get('/chuandaura', [App\Http\Controllers\ChuandauraController::class, 'index'])->name('chuandaura.index');
Route::get('/chuandaura/create', [App\Http\Controllers\ChuandauraController::class, 'create'])->name('chuandaura.create');
Route::post('/chuandaura', [App\Http\Controllers\ChuandauraController::class, 'store'])->name('chuandaura.store');
Route::get('/chuandaura/{id}/edit', [App\Http\Controllers\ChuandauraController::class, 'edit'])->name('chuandaura.edit');
Route::put('/chuandaura/{id}', [App\Http\Controllers\ChuandauraController::class, 'update'])->name('chuandaura.update');
Route::delete('/chuandaura/{id}', [App\Http\Controllers\ChuandauraController::class, 'destroy'])->name('chuandaura.destroy');
Route::get('/chuandaura/{id}', [App\Http\Controllers\ChuandauraController::class, 'show'])->name('chuandaura.show');

Route::middleware(['auth', 'admin'])->group(function () {
    //Route::resource('users', UserController::class);
    Route::resource('khoa', KhoaController::class);
    Route::resource('bomon', BomonController::class);
    Route::resource('khoikienthuc', KhoikienthucController::class);
    Route::resource('loaihocphan', LoaihocphanController::class);
});

Route::middleware(['auth', 'biensoan'])->group(function () {
    Route::resource('ctdthocphan', CtdtHocphanController::class);
});










