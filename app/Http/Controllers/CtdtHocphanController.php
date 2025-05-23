<?php

namespace App\Http\Controllers;

use App\Models\CtdtHocphan;
use App\Models\Chuongtrinhdaotao;
use App\Models\Hocphan;
use Illuminate\Http\Request;

class CtdtHocphanController extends Controller
{
    
    public function index(Request $request)
    {
        $query = CtdtHocphan::with(['chuongtrinhdaotao', 'hocphan'])->orderBy('created_at', 'desc');

        if ($request->has('CTDT_ID') && $request->CTDT_ID != '') {
            $query->where('CTDT_ID', $request->CTDT_ID);
        }

        $ctdtHocphans = $query->get();
        $chuongtrinhdaotaos = \App\Models\Chuongtrinhdaotao::all();

        return view('ctdthocphan.index', compact('ctdtHocphans', 'chuongtrinhdaotaos'));
    }

   
    public function create()
    {
        $chuongtrinhdaotaos = Chuongtrinhdaotao::all();

        // Nếu không có chương trình nào thì không hiển thị học phần
        $firstCTDT = $chuongtrinhdaotaos->first();
    
        $existingHocPhanIDs = [];
        if ($firstCTDT) {
            $existingHocPhanIDs = CtdtHocphan::where('CTDT_ID', $firstCTDT->id)->pluck('HocPhanID')->toArray();
        }
    
        $hocphans = Hocphan::with('khoikienthuc')
            ->whereNotIn('id', $existingHocPhanIDs)
            ->get()
            ->groupBy('KhoiKienThucID');
    
        return view('ctdthocphan.create', compact('chuongtrinhdaotaos', 'hocphans', 'firstCTDT'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'CTDT_ID' => 'required|exists:chuongtrinhdaotaos,id',
            'HocPhanID' => 'required|array',
            'HocPhanID.*' => 'exists:hocphans,id',
        ]);

        foreach ($request->HocPhanID as $hocPhanId) {
            $ctdtHocphan = new CtdtHocphan();
            $ctdtHocphan->CTDT_ID = $request->CTDT_ID;
            $ctdtHocphan->HocPhanID = $hocPhanId;
            $ctdtHocphan->save();
        }

        return redirect()->route('ctdthocphan.index')->with('success', 'CTDT Học phần created successfully.');
    }

    
    public function show($id)
    {
        $ctdtHocphan = CtdtHocphan::findOrFail($id);
        return view('ctdthocphan.show', compact('ctdtHocphan'));
    }

 
    public function edit($id)
    {
        $ctdtHocphan = CtdtHocphan::findOrFail($id);
        $chuongtrinhdaotaos = Chuongtrinhdaotao::all();
        $hocphans = Hocphan::all();
        return view('ctdthocphan.edit', compact('ctdtHocphan', 'chuongtrinhdaotaos', 'hocphans'));
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            'CTDT_ID' => 'required|exists:chuongtrinhdaotaos,id',
            'HocPhanID' => 'required|exists:hocphans,id',
        ]);

        $ctdtHocphan = CtdtHocphan::findOrFail($id);
        $ctdtHocphan->CTDT_ID = $request->CTDT_ID;
        $ctdtHocphan->HocPhanID = $request->HocPhanID;
        $ctdtHocphan->save();

        return redirect()->route('ctdthocphan.index')->with('success', 'CTDT Học phần updated successfully.');
    }

 
    public function destroy($id)
    {
        $ctdtHocphan = CtdtHocphan::findOrFail($id);
        $ctdtHocphan->delete();

        return redirect()->route('ctdthocphan.index')->with('success', 'CTDT Học phần deleted successfully.');
    }

    public function getHocphans($ctdt_id)
{
    $existingHocPhanIDs = CtdtHocphan::where('CTDT_ID', $ctdt_id)->pluck('HocPhanID');

    $hocphans = Hocphan::with('khoikienthuc')
        ->whereNotIn('id', $existingHocPhanIDs)
        ->get()
        ->groupBy('KhoiKienThucID');

    $formatted = [];

    foreach ($hocphans as $group => $items) {
        $formatted[] = [
            'group' => $items->first()->khoikienthuc->TenKhoi ?? 'Không rõ',
            'items' => $items->map(function ($hp) {
                return [
                    'id' => $hp->id,
                    'label' => "{$hp->MaHocPhan} - {$hp->TenHocPhan} - Học kỳ: {$hp->HocKy}"
                ];
            })->toArray()
        ];
    }

    return response()->json($formatted);
}

}
