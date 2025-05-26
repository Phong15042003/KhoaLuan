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
    $firstCTDT = $chuongtrinhdaotaos->first();

    // ❗ Lấy danh sách học phần chưa được gán vào bất kỳ CTDT nào
    $usedHocPhanIDs = CtdtHocphan::pluck('HocPhanID');
    $hocphans = Hocphan::with('khoikienthuc')
        ->whereNotIn('id', $usedHocPhanIDs)
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

        return redirect()->route('ctdthocphan.index')->with('success', 'Đã lưu.');
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

        return redirect()->route('ctdthocphan.index')->with('success', 'Đã cập nhật.');
    }

 
    public function destroy($id)
    {
        $ctdtHocphan = CtdtHocphan::findOrFail($id);
        $ctdtHocphan->delete();

        return redirect()->route('ctdthocphan.index')->with('success', 'Đã xóa.');
    }

    public function getHocphans($ctdt_id)
{
    // Lấy toàn bộ học phần đã được dùng ở bất kỳ CTDT nào
    $existingHocPhanIDs = CtdtHocphan::pluck('HocPhanID');

    // Lấy các học phần chưa thuộc CTDT nào
    $hocphans = Hocphan::with('khoikienthuc')
        ->whereNotIn('id', $existingHocPhanIDs)
        ->get()
        ->groupBy('KhoiKienThucID');

    $formatted = [];

    foreach ($hocphans as $group => $items) {
        $formatted[] = [
            'group' => optional($items->first()->khoikienthuc)->TenKhoi ?? 'Không rõ',
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
public function destroyAll(Request $request)
{
    $ctdt_id = $request->CTDT_ID;

    if (!$ctdt_id) {
        return redirect()->route('ctdthocphan.index')->with('error', 'Không tìm thấy CTĐT để xóa.');
    }

    $deleted = \App\Models\CTDTHocPhan::where('CTDT_ID', $ctdt_id)->delete();

    return redirect()->route('ctdthocphan.index')->with('success', "Đã xóa $deleted học phần của chương trình đào tạo.");
}



}
