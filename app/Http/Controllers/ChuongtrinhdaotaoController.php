<?php

namespace App\Http\Controllers;

use App\Models\Chuongtrinhdaotao;
use App\Models\Nganhhoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $hocphans = $chuongtrinhdaotao->hocphans; // Get the related hocphans
        return view('chuongtrinhdaotao.show', compact('chuongtrinhdaotao', 'hocphans'));
    }
    public function showhocky($id)
    {
        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $hocphansByHocky = $chuongtrinhdaotao->hocphans->sortBy('HocKy')->groupBy('HocKy'); // Sort and group hocphans by HocKy
        return view('chuongtrinhdaotao.showhocky', compact('chuongtrinhdaotao', 'hocphansByHocky'));
    }

    /**
     * Show the changed courses for the specified resource.
     */
    public function showChangedCourses($id)
    {
        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $hocphans = $chuongtrinhdaotao->hocphans;

        $changedHocphans = [];

        foreach ($hocphans as $hocphan) {
            $mon_cu = DB::table('hocphans')
                ->where('sothutu', $hocphan->sothutu)
                ->where('MaHocPhan', $hocphan->MaHocPhan)
                ->where('id', '<>', $hocphan->id)
                ->where('created_at', '<', $hocphan->created_at)
                ->orderBy('created_at', 'desc')
                ->first();

            if ($mon_cu && $mon_cu->TenHocPhan !== $hocphan->TenHocPhan) {
                $hocphan->TenHocPhanCu = $mon_cu->TenHocPhan;
                $changedHocphans[] = $hocphan;
            }
        }

        return view('chuongtrinhdaotao.changed-courses', compact('changedHocphans'));
    }

    /**
     * Show the hocphans grouped by khoikienthuc for the specified resource.
     */
    public function showKhoikienthuc($id)
    {
        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $hocphansByKhoikienthuc = $chuongtrinhdaotao->hocphans->sortBy('KhoiKienThucID')->groupBy('KhoiKienThucID'); // Sort and group hocphans by KhoiKienThucID
        return view('chuongtrinhdaotao.showkhoikienthuc', compact('chuongtrinhdaotao', 'hocphansByKhoikienthuc'));
    }

    /**
     * Show the hocphans grouped by loaihocphan for the specified resource.
     */
    public function showLoaihocphan($id)
    {
        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $hocphansByLoaihocphan = $chuongtrinhdaotao->hocphans->sortBy('LoaiHocPhanID')->groupBy('LoaiHocPhanID'); // Sort and group hocphans by LoaiHocPhanID
        return view('chuongtrinhdaotao.showloaihocphan', compact('chuongtrinhdaotao', 'hocphansByLoaihocphan'));
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
