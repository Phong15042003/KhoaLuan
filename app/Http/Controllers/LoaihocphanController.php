<?php

namespace App\Http\Controllers;

use App\Models\loaihocphan;
use Illuminate\Http\Request;

class LoaihocphanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loaihocphans = Loaihocphan::orderBy('created_at', 'desc')->get();
        return view('loaihocphan.index', compact('loaihocphans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('loaihocphan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'TenLoaiHocPhan' => 'required|string|max:100|unique:loaihocphans',
        ]);

        $loaihocphan = new Loaihocphan();
        $loaihocphan->TenLoaiHocPhan = $request->TenLoaiHocPhan;
        $loaihocphan->save();

        return redirect()->route('loaihocphan.index')->with('success', 'Thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $loaihocphan = Loaihocphan::findOrFail($id);
        return view('loaihocphan.show', compact('loaihocphan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $loaihocphan = Loaihocphan::findOrFail($id);
        return view('loaihocphan.edit', compact('loaihocphan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'TenLoaiHocPhan' => 'required|string|max:100|unique:loaihocphans,TenLoaiHocPhan,' . $id,
        ]);

        $loaihocphan = Loaihocphan::findOrFail($id);
        $loaihocphan->TenLoaiHocPhan = $request->TenLoaiHocPhan;
        $loaihocphan->save();

        return redirect()->route('loaihocphan.index')->with('success', 'Đã cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $loaihocphan = Loaihocphan::findOrFail($id);
        $loaihocphan->delete();

        return redirect()->route('loaihocphan.index')->with('success', 'Đã xóa.');
    }
}
