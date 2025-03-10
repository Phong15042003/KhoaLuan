<?php

namespace App\Http\Controllers;

use App\Models\CtdtHocphan;
use App\Models\Chuongtrinhdaotao;
use App\Models\Hocphan;
use Illuminate\Http\Request;

class CtdtHocphanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ctdtHocphans = CtdtHocphan::orderBy('created_at', 'desc')->get();
        return view('ctdthocphan.index', compact('ctdtHocphans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chuongtrinhdaotaos = Chuongtrinhdaotao::all();
        $hocphans = Hocphan::with('khoikienthuc')->get()->groupBy('KhoiKienThucID');
        return view('ctdthocphan.create', compact('chuongtrinhdaotaos', 'hocphans'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ctdtHocphan = CtdtHocphan::findOrFail($id);
        return view('ctdthocphan.show', compact('ctdtHocphan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ctdtHocphan = CtdtHocphan::findOrFail($id);
        $chuongtrinhdaotaos = Chuongtrinhdaotao::all();
        $hocphans = Hocphan::all();
        return view('ctdthocphan.edit', compact('ctdtHocphan', 'chuongtrinhdaotaos', 'hocphans'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ctdtHocphan = CtdtHocphan::findOrFail($id);
        $ctdtHocphan->delete();

        return redirect()->route('ctdthocphan.index')->with('success', 'CTDT Học phần deleted successfully.');
    }
}
