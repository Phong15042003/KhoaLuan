<?php

namespace App\Http\Controllers;

use App\Models\Khoahoc;
use App\Models\Chuongtrinhdaotao;
use Illuminate\Http\Request;

class KhoahocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $khoahocs = Khoahoc::orderBy('created_at', 'desc')->get();
        return view('khoahoc.index', compact('khoahocs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chuongtrinhdaotaos = Chuongtrinhdaotao::all();
        return view('khoahoc.create', compact('chuongtrinhdaotaos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'MaKhoaHoc' => 'required|string|max:50|unique:khoahocs',
            'TenKhoaHoc' => 'required|string|max:100',
            'CTDT_ID' => 'required|exists:chuongtrinhdaotaos,id',
            'NamBatDau' => 'required|string|max:20',
            'NamKetThuc' => 'required|string|max:20',
        ]);

        $khoahoc = new Khoahoc();
        $khoahoc->MaKhoaHoc = $request->MaKhoaHoc;
        $khoahoc->TenKhoaHoc = $request->TenKhoaHoc;
        $khoahoc->CTDT_ID = $request->CTDT_ID;
        $khoahoc->NamBatDau = $request->NamBatDau;
        $khoahoc->NamKetThuc = $request->NamKetThuc;
        $khoahoc->save();

        return redirect()->route('khoahoc.index')->with('success', 'Khóa học created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $khoahoc = Khoahoc::findOrFail($id);
        return view('khoahoc.show', compact('khoahoc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $khoahoc = Khoahoc::findOrFail($id);
        $chuongtrinhdaotaos = Chuongtrinhdaotao::all();
        return view('khoahoc.edit', compact('khoahoc', 'chuongtrinhdaotaos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'MaKhoaHoc' => 'required|string|max:50|unique:khoahocs,MaKhoaHoc,' . $id,
            'TenKhoaHoc' => 'required|string|max:100',
            'CTDT_ID' => 'required|exists:chuongtrinhdaotaos,id',
            'NamBatDau' => 'required|string|max:20',
            'NamKetThuc' => 'required|string|max:20',
        ]);

        $khoahoc = Khoahoc::findOrFail($id);
        $khoahoc->MaKhoaHoc = $request->MaKhoaHoc;
        $khoahoc->TenKhoaHoc = $request->TenKhoaHoc;
        $khoahoc->CTDT_ID = $request->CTDT_ID;
        $khoahoc->NamBatDau = $request->NamBatDau;
        $khoahoc->NamKetThuc = $request->NamKetThuc;
        $khoahoc->save();

        return redirect()->route('khoahoc.index')->with('success', 'Khóa học updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $khoahoc = Khoahoc::findOrFail($id);
        $khoahoc->delete();

        return redirect()->route('khoahoc.index')->with('success', 'Khóa học deleted successfully.');
    }
}
