<?php

namespace App\Http\Controllers;

use App\Models\Hocphan;
use App\Models\Khoikienthuc;
use App\Models\Loaihocphan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HocphanImport;
class HocphanController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Hocphan::query();

    if ($request->has('chuongtrinhdaotao_id') && $request->chuongtrinhdaotao_id != '') {
        $ctdt_id = $request->chuongtrinhdaotao_id;

        $query->whereHas('chuongtrinhdaotaos', function($q) use ($ctdt_id) {
            $q->where('chuongtrinhdaotaos.id', $ctdt_id);
        });
    }

    $hocphans = $query->orderBy('sothutu')->with(['loaihocphan', 'khoikienthuc'])->get();
    $chuongtrinhdaotaos = \App\Models\Chuongtrinhdaotao::all();

    return view('hocphan.index', compact('hocphans', 'chuongtrinhdaotaos'));
    }

  
    public function create()
    {
        $khoikienthucs = Khoikienthuc::all();
        $loaihocphans = Loaihocphan::all();
        return view('hocphan.create', compact('khoikienthucs', 'loaihocphans'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'sothutu' => 'required|integer',
            'MaHocPhan' => 'required|string|max:50|',
            'TenHocPhan' => 'required|string|max:100',
            'TenHocPhanTiengAnh' => 'required|string|max:100',
            'SoTinChi' => 'required|integer',
            'SoTietLyThuyet' => 'required|integer',
            'SoTietThucHanh' => 'required|integer',
            'HocKy' => 'required|integer',
            'DkTienQuyet' => 'nullable|integer',
            'DkHocTruoc' => 'nullable|integer',
            'DkSongHanh' => 'nullable|integer',
            'KhoiKienThucID' => 'required|exists:khoikienthucs,id',
            'LoaiHocPhanID' => 'required|exists:loaihocphans,id',
            'NhomTuChon' => 'nullable|integer',
        ]);

        $hocphan = new Hocphan();
        $hocphan->sothutu = $request->sothutu;
        $hocphan->MaHocPhan = $request->MaHocPhan;
        $hocphan->TenHocPhan = $request->TenHocPhan;
        $hocphan->TenHocPhanTiengAnh = $request->TenHocPhanTiengAnh;
        $hocphan->SoTinChi = $request->SoTinChi;
        $hocphan->SoTietLyThuyet = $request->SoTietLyThuyet;
        $hocphan->SoTietThucHanh = $request->SoTietThucHanh;
        $hocphan->HocKy = $request->HocKy;
        $hocphan->DkTienQuyet = $request->DkTienQuyet;
        $hocphan->DkHocTruoc = $request->DkHocTruoc;
        $hocphan->DkSongHanh = $request->DkSongHanh;
        $hocphan->KhoiKienThucID = $request->KhoiKienThucID;
        $hocphan->LoaiHocPhanID = $request->LoaiHocPhanID;
        $hocphan->NhomTuChon = $request->NhomTuChon;
        $hocphan->save();

        return redirect()->route('hocphan.index')->with('success', 'Học phần created successfully.');
    }

 
    public function show($id)
    {
        $hocphan = Hocphan::findOrFail($id);
        return view('hocphan.show', compact('hocphan'));
    }

  
    public function edit($id)
    {
        $hocphan = Hocphan::findOrFail($id);
        $khoikienthucs = Khoikienthuc::all();
        $loaihocphans = Loaihocphan::all();
        return view('hocphan.edit', compact('hocphan', 'khoikienthucs', 'loaihocphans'));
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            'sothutu' => 'required|integer',
            'MaHocPhan' => 'required|string|max:50|',
            'TenHocPhan' => 'required|string|max:100',
            'TenHocPhanTiengAnh' => 'required|string|max:100',
            'SoTinChi' => 'required|integer',
            'SoTietLyThuyet' => 'required|integer',
            'SoTietThucHanh' => 'required|integer',
            'HocKy' => 'required|integer',
            'DkTienQuyet' => 'nullable|integer',
            'DkHocTruoc' => 'nullable|integer',
            'DkSongHanh' => 'nullable|integer',
            'KhoiKienThucID' => 'required|exists:khoikienthucs,id',
            'LoaiHocPhanID' => 'required|exists:loaihocphans,id',
            'NhomTuChon' => 'nullable|integer',
        ]);

        $hocphan = Hocphan::findOrFail($id);
        $hocphan->sothutu = $request->sothutu;
        $hocphan->MaHocPhan = $request->MaHocPhan;
        $hocphan->TenHocPhan = $request->TenHocPhan;
        $hocphan->TenHocPhanTiengAnh = $request->TenHocPhanTiengAnh;
        $hocphan->SoTinChi = $request->SoTinChi;
        $hocphan->SoTietLyThuyet = $request->SoTietLyThuyet;
        $hocphan->SoTietThucHanh = $request->SoTietThucHanh;
        $hocphan->HocKy = $request->HocKy;
        $hocphan->DkTienQuyet = $request->DkTienQuyet;
        $hocphan->DkHocTruoc = $request->DkHocTruoc;
        $hocphan->DkSongHanh = $request->DkSongHanh;
        $hocphan->KhoiKienThucID = $request->KhoiKienThucID;
        $hocphan->LoaiHocPhanID = $request->LoaiHocPhanID;
        $hocphan->NhomTuChon = $request->NhomTuChon;
        $hocphan->save();

        return redirect()->route('hocphan.index')->with('success', 'Học phần updated successfully.');
    }

   
   public function destroy($id)
{
    $hocphan = Hocphan::findOrFail($id);

    if ($hocphan->chuongtrinhdaotaos()->count() > 0) {
        $tenCTDT = $hocphan->chuongtrinhdaotaos->pluck('TenChuongTrinh')->join(', ');
        return redirect()->route('hocphan.index')
            ->with('error', "Học phần này đang được sử dụng trong chương trình đào tạo: $tenCTDT! Không thể xóa.");
    }

    $hocphan->delete();

    return redirect()->route('hocphan.index')->with('success', 'Học phần đã được xóa thành công.');
}


    //xu ly them bang excecl
    public function excel()
    {
        return view('hocphan.excel');
    }

 
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new HocphanImport, $request->file('file'));

        return redirect()->route('hocphan.index')->with('success', 'Nhập học phần thành công!');
    }
}
