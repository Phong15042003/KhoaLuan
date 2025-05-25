<?php

namespace App\Http\Controllers;

use App\Models\Chuongtrinhdaotao;
use App\Models\Nganhhoc;
use App\Models\chuandaura;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ChuongtrinhdaotaoController extends Controller
{
   
    public function index()
    {
        $chuongtrinhdaotaos = Chuongtrinhdaotao::orderBy('created_at', 'desc')->get();
        return view('chuongtrinhdaotao.index', compact('chuongtrinhdaotaos'));
    }

  
    public function create()
    {
        $nganhhocs = Nganhhoc::all();
        return view('chuongtrinhdaotao.create', compact('nganhhocs'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'MaCTDT' => 'required|string|max:50|unique:chuongtrinhdaotaos',
            'TenChuongTrinh' => 'required|string|max:100',
            'NganhHocID' => 'required|exists:nganhhocs,id',
        ]);

        $chuongtrinhdaotao = new Chuongtrinhdaotao();
        $chuongtrinhdaotao->MaCTDT = $request->MaCTDT;
        $chuongtrinhdaotao->TenChuongTrinh = $request->TenChuongTrinh;
        $chuongtrinhdaotao->TenChuongTrinhTiengAnh = $request->TenChuongTrinhTiengAnh;
        $chuongtrinhdaotao->NganhHocID = $request->NganhHocID;
        $chuongtrinhdaotao->Noidung = $request->Noidung;
        $chuongtrinhdaotao->save();

        return redirect()->route('chuongtrinhdaotao.index')->with('success', 'Chương trình đào tạo created successfully.');
    }


   
public function show($id)
{
    $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
    $hocphans = $chuongtrinhdaotao->hocphans()->with('khoikienthuc', 'loaihocphan')->get();
    

    $thongKe = [];

    foreach ($hocphans->groupBy('KhoiKienThucID') as $idKhoi => $group) {
        $tenKhoi = optional($group->first()->khoikienthuc)->TenKhoi ?? 'Không rõ';

        $bb = $group->filter(fn($hp) => optional($hp->loaihocphan)->TenLoaiHocPhan === 'Bắt buộc');
        $tc = $group->filter(fn($hp) => optional($hp->loaihocphan)->TenLoaiHocPhan === 'Tự chọn')->groupBy('NhomTuChon');

        $soTinChiBB = $bb->sum('SoTinChi');
        $soTinChiTC = $tc->sum(fn($g) => $g->first()->SoTinChi);
        $tong = $soTinChiBB + $soTinChiTC;

        $thongKe[] = [
            'TenKhoi' => $tenKhoi,
            'BatBuoc' => $soTinChiBB,
            'TuChon' => $soTinChiTC,
            'Tong' => $tong,
        ];
    }

    $tongBB = collect($thongKe)->sum('BatBuoc');
    $tongTC = collect($thongKe)->sum('TuChon');
    $tongAll = $tongBB + $tongTC;

    foreach ($thongKe as &$row) {
        $row['TyLeBB'] = $tongAll > 0 ? round($row['BatBuoc'] * 100 / $tongAll, 1) : 0;
        $row['TyLeTC'] = $tongAll > 0 ? round($row['TuChon'] * 100 / $tongAll, 1) : 0;
        $row['TyLeTong'] = $tongAll > 0 ? round($row['Tong'] * 100 / $tongAll, 1) : 0;
    }

    $thongKe[] = [
        'TenKhoi' => 'Tổng cộng',
        'BatBuoc' => $tongBB,
        'TuChon' => $tongTC,
        'Tong' => $tongAll,
        'TyLeBB' => $tongAll > 0 ? round($tongBB * 100 / $tongAll, 1) : 0,
        'TyLeTC' => $tongAll > 0 ? round($tongTC * 100 / $tongAll, 1) : 0,
        'TyLeTong' => 100.0,
    ];

    return view('chuongtrinhdaotao.show', compact('chuongtrinhdaotao', 'hocphans', 'thongKe'));
}




  //hien thi nhung mon bi thay doi
    public function showChangedCourses($id)
    {
           $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
    $hocphans = $chuongtrinhdaotao->hocphans;

    $changedHocphans = [];

    foreach ($hocphans as $hocphan) {
        $mon_cu = DB::table('hocphans')
            ->where('sothutu', $hocphan->sothutu)
            ->where('id', '<>', $hocphan->id)
            ->where('created_at', '<', $hocphan->created_at)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($mon_cu && (
            $mon_cu->TenHocPhan !== $hocphan->TenHocPhan ||
            $mon_cu->MaHocPhan !== $hocphan->MaHocPhan
        )) {
            // Gán thông tin cũ để hiển thị
            $hocphan->TenHocPhanCu = $mon_cu->TenHocPhan !== $hocphan->TenHocPhan ? $mon_cu->TenHocPhan : null;
            $hocphan->MaHocPhanCu = $mon_cu->MaHocPhan !== $hocphan->MaHocPhan ? $mon_cu->MaHocPhan : null;
            $changedHocphans[] = $hocphan;
        }
    }

    return view('chuongtrinhdaotao.changed-courses', compact('changedHocphans', 'chuongtrinhdaotao'));
    }

    public function showHocky($id)
    {
        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $hocphansByHocky = $chuongtrinhdaotao->hocphans->sortBy('HocKy')->groupBy('HocKy');
        return view('chuongtrinhdaotao.showhocky', compact('chuongtrinhdaotao', 'hocphansByHocky'));
    }
    public function showKhoikienthuc($id)
    {
        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $hocphansByKhoikienthuc = $chuongtrinhdaotao->hocphans->sortBy('KhoiKienThucID')->groupBy('KhoiKienThucID'); // Sort and group hocphans by KhoiKienThucID
        return view('chuongtrinhdaotao.showkhoikienthuc', compact('chuongtrinhdaotao', 'hocphansByKhoikienthuc'));
    }


    public function showLoaihocphan($id)
    {
        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $hocphansByLoaihocphan = $chuongtrinhdaotao->hocphans->sortBy('LoaiHocPhanID')->groupBy('LoaiHocPhanID'); // Sort and group hocphans by LoaiHocPhanID
        return view('chuongtrinhdaotao.showloaihocphan', compact('chuongtrinhdaotao', 'hocphansByLoaihocphan'));
    }


    public function edit($id)
    {
        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $nganhhocs = Nganhhoc::all();
        return view('chuongtrinhdaotao.edit', compact('chuongtrinhdaotao', 'nganhhocs'));
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            'MaCTDT' => 'required|string|max:50|unique:chuongtrinhdaotaos,MaCTDT,' . $id,
            'TenChuongTrinh' => 'required|string|max:100',
            'TenChuongTrinhTiengAnh' => 'required|string|max:100',
            'NganhHocID' => 'required|exists:nganhhocs,id',
            'Noidung' => 'required|string',
        ]);

        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $chuongtrinhdaotao->MaCTDT = $request->MaCTDT;
        $chuongtrinhdaotao->TenChuongTrinh = $request->TenChuongTrinh;
        $chuongtrinhdaotao->TenChuongTrinhTiengAnh = $request->TenChuongTrinhTiengAnh;
        $chuongtrinhdaotao->NganhHocID = $request->NganhHocID;
        $chuongtrinhdaotao->Noidung = $request->Noidung;
        $chuongtrinhdaotao->save();

        return redirect()->route('chuongtrinhdaotao.index')->with('success', 'Chương trình đào tạo updated successfully.');
    }


    public function destroy($id)
    {
        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $chuongtrinhdaotao->delete();

        return redirect()->route('chuongtrinhdaotao.index')->with('success', 'Chương trình đào tạo deleted successfully.');
    }

    public function pdf($id)
{
    $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
    $hocphans = $chuongtrinhdaotao->hocphans()->with('khoikienthuc', 'loaihocphan')->get();
    
    // Tính thống kê như show()
    $thongKe = [];
    foreach ($hocphans->groupBy('KhoiKienThucID') as $idKhoi => $group) {
        $tenKhoi = optional($group->first()->khoikienthuc)->TenKhoi ?? 'Không rõ';

        $bb = $group->filter(fn($hp) => optional($hp->loaihocphan)->TenLoaiHocPhan === 'Bắt buộc');
        $tc = $group->filter(fn($hp) => optional($hp->loaihocphan)->TenLoaiHocPhan === 'Tự chọn')->groupBy('NhomTuChon');

        $soTinChiBB = $bb->sum('SoTinChi');
        $soTinChiTC = $tc->sum(fn($g) => $g->first()->SoTinChi);
        $tong = $soTinChiBB + $soTinChiTC;

        $thongKe[] = [
            'TenKhoi' => $tenKhoi,
            'BatBuoc' => $soTinChiBB,
            'TuChon' => $soTinChiTC,
            'Tong' => $tong,
        ];
    }

    $tongBB = collect($thongKe)->sum('BatBuoc');
    $tongTC = collect($thongKe)->sum('TuChon');
    $tongAll = $tongBB + $tongTC;

    foreach ($thongKe as &$row) {
        $row['TyLeBB'] = $tongAll > 0 ? round($row['BatBuoc'] * 100 / $tongAll, 1) : 0;
        $row['TyLeTC'] = $tongAll > 0 ? round($row['TuChon'] * 100 / $tongAll, 1) : 0;
        $row['TyLeTong'] = $tongAll > 0 ? round($row['Tong'] * 100 / $tongAll, 1) : 0;
    }

    $thongKe[] = [
        'TenKhoi' => 'Tổng cộng',
        'BatBuoc' => $tongBB,
        'TuChon' => $tongTC,
        'Tong' => $tongAll,
        'TyLeBB' => $tongAll > 0 ? round($tongBB * 100 / $tongAll, 1) : 0,
        'TyLeTC' => $tongAll > 0 ? round($tongTC * 100 / $tongAll, 1) : 0,
        'TyLeTong' => 100.0,
    ];

    $hocphansByKhoikienthuc = $hocphans->sortBy('KhoiKienThucID')->groupBy('KhoiKienThucID');
    $hocphansByHocky = $hocphans->sortBy('HocKy')->groupBy('HocKy');
    $chuandauras = chuandaura::whereIn('hocphan_id', $hocphans->pluck('id'))->get();

    return PDF::loadView('chuongtrinhdaotao.pdf', compact(
        'chuongtrinhdaotao', 'hocphansByKhoikienthuc', 'hocphansByHocky', 'chuandauras', 'thongKe'
    ))->stream(Str::slug($chuongtrinhdaotao->TenChuongTrinh) . '.pdf');
}



    
}
