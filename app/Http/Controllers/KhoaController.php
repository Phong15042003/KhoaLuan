<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use Illuminate\Http\Request;

class KhoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $khoas = Khoa::orderBy('created_at', 'desc')->get();
        return view('khoa.index', compact('khoas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('khoa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'MaKhoa' => 'required|string|max:50|unique:khoas',
            'TenKhoa' => 'required|string|max:100',
        ]);

        $khoa = new Khoa();
        $khoa->MaKhoa = $request->MaKhoa;
        $khoa->TenKhoa = $request->TenKhoa;
        $khoa->save();

        return redirect()->route('khoa.index')->with('success', 'Khoa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $khoa = Khoa::findOrFail($id);
        return view('khoa.show', compact('khoa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $khoa = Khoa::findOrFail($id);
        return view('khoa.edit', compact('khoa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'MaKhoa' => 'required|string|max:50|unique:khoas,MaKhoa,' . $id,
            'TenKhoa' => 'required|string|max:100',
        ]);

        $khoa = Khoa::findOrFail($id);
        $khoa->MaKhoa = $request->MaKhoa;
        $khoa->TenKhoa = $request->TenKhoa;
        $khoa->save();

        return redirect()->route('khoa.index')->with('success', 'Khoa updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $khoa = Khoa::findOrFail($id);
        $khoa->delete();

        return redirect()->route('khoa.index')->with('success', 'Khoa deleted successfully.');
    }
}
