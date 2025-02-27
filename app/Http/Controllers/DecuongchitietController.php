<?php

namespace App\Http\Controllers;

use App\Models\Decuongchitiet;
use App\Models\Hocphan;
use Illuminate\Http\Request;

class DecuongchitietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decuongchitiets = Decuongchitiet::orderBy('created_at', 'desc')->get();
        return view('decuongchitiet.index', compact('decuongchitiets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hocphans = Hocphan::all();
        return view('decuongchitiet.create', compact('hocphans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'HocPhanID' => 'required|exists:hocphans,id',
            'NoiDung' => 'required|string',
           
        ]);

        $decuongchitiet = new Decuongchitiet();
        $decuongchitiet->HocPhanID = $request->HocPhanID;
        $decuongchitiet->NoiDung = $request->NoiDung;
       
        $decuongchitiet->save();

        return redirect()->route('decuongchitiet.index')->with('success', 'Đề cương chi tiết created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $decuongchitiet = Decuongchitiet::findOrFail($id);
        return view('decuongchitiet.show', compact('decuongchitiet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $decuongchitiet = Decuongchitiet::findOrFail($id);
        $hocphans = Hocphan::all();
        return view('decuongchitiet.edit', compact('decuongchitiet', 'hocphans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'HocPhanID' => 'required|exists:hocphans,id',
            'NoiDung' => 'required|string',
            
        ]);

        $decuongchitiet = Decuongchitiet::findOrFail($id);
        $decuongchitiet->HocPhanID = $request->HocPhanID;
        $decuongchitiet->NoiDung = $request->NoiDung;
        
        $decuongchitiet->save();

        return redirect()->route('decuongchitiet.index')->with('success', 'Đề cương chi tiết updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $decuongchitiet = Decuongchitiet::findOrFail($id);
        $decuongchitiet->delete();

        return redirect()->route('decuongchitiet.index')->with('success', 'Đề cương chi tiết deleted successfully.');
    }
}
