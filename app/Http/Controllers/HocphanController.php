<?php

namespace App\Http\Controllers;

use App\Models\Hocphan;
use App\Models\Khoikienthuc;
use App\Models\Loaihocphan;
use Illuminate\Http\Request;

class HocphanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hocphans = Hocphan::orderBy('created_at')->get();
        return view('hocphan.index', compact('hocphans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $khoikienthucs = Khoikienthuc::all();
        $loaihocphans = Loaihocphan::all();
        return view('hocphan.create', compact('khoikienthucs', 'loaihocphans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sothutu' => 'required|integer',
            'MaHocPhan' => 'required|string|max:50|unique:hocphans',
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
        $hocphan->save();

        return redirect()->route('hocphan.index')->with('success', 'Học phần created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hocphan = Hocphan::findOrFail($id);
        return view('hocphan.show', compact('hocphan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hocphan = Hocphan::findOrFail($id);
        $khoikienthucs = Khoikienthuc::all();
        $loaihocphans = Loaihocphan::all();
        return view('hocphan.edit', compact('hocphan', 'khoikienthucs', 'loaihocphans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sothutu' => 'required|integer',
            'MaHocPhan' => 'required|string|max:50|unique:hocphans,MaHocPhan,' . $id,
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
        $hocphan->save();

        return redirect()->route('hocphan.index')->with('success', 'Học phần updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hocphan = Hocphan::findOrFail($id);
        $hocphan->delete();

        return redirect()->route('hocphan.index')->with('success', 'Học phần deleted successfully.');
    }
}
