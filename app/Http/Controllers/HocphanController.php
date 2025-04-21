<?php

namespace App\Http\Controllers;

use App\Models\Hocphan;
use App\Models\Khoikienthuc;
use App\Models\Loaihocphan;
use Illuminate\Http\Request;

class HocphanController extends Controller
{
    
    public function index()
    {
        $hocphans = Hocphan::orderBy('created_at')->get();
        return view('hocphan.index', compact('hocphans'));
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
        $hocphan->delete();

        return redirect()->route('hocphan.index')->with('success', 'Học phần deleted successfully.');
    }
}
