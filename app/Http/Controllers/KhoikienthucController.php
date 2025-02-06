<?php

namespace App\Http\Controllers;

use App\Models\khoikienthuc;
use Illuminate\Http\Request;

class KhoikienthucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $khoikienthucs = Khoikienthuc::orderBy('created_at', 'desc')->get();
        return view('khoikienthuc.index', compact('khoikienthucs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('khoikienthuc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'MaKhoiKienThuc' => 'required|string|max:50|unique:khoikienthucs',
            'TenKhoi' => 'required|string|max:100',
        ]);

        $khoikienthuc = new Khoikienthuc();
        $khoikienthuc->MaKhoiKienThuc = $request->MaKhoiKienThuc;
        $khoikienthuc->TenKhoi = $request->TenKhoi;
        $khoikienthuc->save();

        return redirect()->route('khoikienthuc.index')->with('success', 'Khối kiến thức created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $khoikienthuc = Khoikienthuc::findOrFail($id);
        return view('khoikienthuc.show', compact('khoikienthuc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $khoikienthuc = Khoikienthuc::findOrFail($id);
        return view('khoikienthuc.edit', compact('khoikienthuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'MaKhoiKienThuc' => 'required|string|max:50|unique:khoikienthucs,MaKhoiKienThuc,' . $id,
            'TenKhoi' => 'required|string|max:100',
        ]);

        $khoikienthuc = Khoikienthuc::findOrFail($id);
        $khoikienthuc->MaKhoiKienThuc = $request->MaKhoiKienThuc;
        $khoikienthuc->TenKhoi = $request->TenKhoi;
        $khoikienthuc->save();

        return redirect()->route('khoikienthuc.index')->with('success', 'Khối kiến thức updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $khoikienthuc = Khoikienthuc::findOrFail($id);
        $khoikienthuc->delete();

        return redirect()->route('khoikienthuc.index')->with('success', 'Khối kiến thức deleted successfully.');
    }
}
