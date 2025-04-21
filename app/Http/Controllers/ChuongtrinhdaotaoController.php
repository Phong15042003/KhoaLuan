<?php

namespace App\Http\Controllers;

use App\Models\Chuongtrinhdaotao;
use App\Models\Nganhhoc;
use App\Models\chuandaura;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $chuongtrinhdaotao->NganhHocID = $request->NganhHocID;
        $chuongtrinhdaotao->save();

        return redirect()->route('chuongtrinhdaotao.index')->with('success', 'Chương trình đào tạo created successfully.');
    }


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

  //hien thi nhung mon bi thay doi
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
            'NganhHocID' => 'required|exists:nganhhocs,id',
        ]);

        $chuongtrinhdaotao = Chuongtrinhdaotao::findOrFail($id);
        $chuongtrinhdaotao->MaCTDT = $request->MaCTDT;
        $chuongtrinhdaotao->TenChuongTrinh = $request->TenChuongTrinh;
        $chuongtrinhdaotao->NganhHocID = $request->NganhHocID;
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
        $hocphansByKhoikienthuc = $chuongtrinhdaotao->hocphans->sortBy('KhoiKienThucID')->groupBy('KhoiKienThucID');
        $hocphansByHocky = $chuongtrinhdaotao->hocphans->sortBy('HocKy')->groupBy('HocKy');
        $chuandauras = chuandaura::whereIn('hocphan_id', $chuongtrinhdaotao->hocphans->pluck('id'))->get();

        $pdf = PDF::loadView('chuongtrinhdaotao.pdf', [
            'chuongtrinhdaotao' => $chuongtrinhdaotao,
            'hocphansByKhoikienthuc' => $hocphansByKhoikienthuc,
            'hocphansByHocky' => $hocphansByHocky,
            'chuandauras' => $chuandauras,
        ])->setPaper('a4', 'landscape'); 
        return $pdf->download('chuongtrinhdaotao.pdf');
    }
}
