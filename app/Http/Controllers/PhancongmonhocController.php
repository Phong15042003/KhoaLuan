<?php

namespace App\Http\Controllers;

use App\Models\Phancongmonhoc;
use App\Models\User;
use App\Models\Hocphan;
use Illuminate\Http\Request;
use App\Models\Chuongtrinhdaotao;

class PhancongmonhocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phancongmonhocs = Phancongmonhoc::orderBy('created_at', 'desc')->get();
        return view('phancongmonhoc.index', compact('phancongmonhocs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $users = User::all();
    $chuongtrinhdaotaos = Chuongtrinhdaotao::all(); // Lấy danh sách CTĐT
    return view('phancongmonhoc.create', compact('users', 'chuongtrinhdaotaos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'biensoan_id' => 'required|exists:users,id',
            'giangvien_id' => 'required|exists:users,id',
            'HocPhanID' => 'required|exists:hocphans,id',
        ]);

        $phancongmonhoc = new Phancongmonhoc();
        $phancongmonhoc->biensoan_id = $request->biensoan_id;
        $phancongmonhoc->giangvien_id = $request->giangvien_id;
        $phancongmonhoc->HocPhanID = $request->HocPhanID;
        $phancongmonhoc->save();

        return redirect()->route('phancongmonhoc.index')->with('success', 'Đã thêm phân công.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $phancongmonhoc = Phancongmonhoc::findOrFail($id);
        return view('phancongmonhoc.show', compact('phancongmonhoc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $phancongmonhoc = Phancongmonhoc::findOrFail($id);
        $users = User::all();
        $hocphans = Hocphan::all();
        return view('phancongmonhoc.edit', compact('phancongmonhoc', 'users', 'hocphans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'biensoan_id' => 'required|exists:users,id',
            'giangvien_id' => 'required|exists:users,id',
            'HocPhanID' => 'required|exists:hocphans,id',
        ]);

        $phancongmonhoc = Phancongmonhoc::findOrFail($id);
        $phancongmonhoc->biensoan_id = $request->biensoan_id;
        $phancongmonhoc->giangvien_id = $request->giangvien_id;
        $phancongmonhoc->HocPhanID = $request->HocPhanID;
        $phancongmonhoc->save();

        return redirect()->route('phancongmonhoc.index')->with('success', 'Đã cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $phancongmonhoc = Phancongmonhoc::findOrFail($id);
        $phancongmonhoc->delete();

        return redirect()->route('phancongmonhoc.index')->with('success', 'Đã xóa.');
    }
}
