<?php

namespace App\Http\Controllers;

use App\Models\chuongtrinhdaotao;
use App\Models\nganhhoc;
use Illuminate\Http\Request;

class ChuongtrinhdaotaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chuongtrinhdaotaos = Chuongtrinhdaotao::orderBy('created_at', 'desc')->get();
        return view('chuongtrinhdaotao.index', compact('chuongtrinhdaotaos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nganhhocs = Nganhhoc::all();
        return view('chuongtrinhdaotao.create', compact('nganhhocs'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
        $chuongtrinhdaotao->NganhHocID = $request->NganhHocID;
        $chuongtrinhdaotao->save();

        return redirect()->route('chuongtrinhdaotao.index')->with('success', 'Chương trình đào tạo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        return view('chuongtrinhdaotao.show', compact('chuongtrinhdaotao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $nganhhocs = Nganhhoc::all();
        return view('chuongtrinhdaotao.edit', compact('chuongtrinhdaotao', 'nganhhocs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'MaCTDT' => 'required|string|max:50|unique:chuongtrinhdaotaos,MaCTDT,' . $id,
            'TenChuongTrinh' => 'required|string|max:100',
            'NganhHocID' => 'required|exists:nganhhocs,id',
        ]);

        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $chuongtrinhdaotao->MaCTDT = $request->MaCTDT;
        $chuongtrinhdaotao->TenChuongTrinh = $request->TenChuongTrinh;
        $chuongtrinhdaotao->NganhHocID = $request->NganhHocID;
        $chuongtrinhdaotao->save();

        return redirect()->route('chuongtrinhdaotao.index')->with('success', 'Chương trình đào tạo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $chuongtrinhdaotao->delete();

        return redirect()->route('chuongtrinhdaotao.index')->with('success', 'Chương trình đào tạo deleted successfully.');
    }
}
