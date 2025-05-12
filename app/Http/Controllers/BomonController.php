<?php

namespace App\Http\Controllers;

use App\Models\bomon;
use App\Models\khoa;
use Illuminate\Http\Request;

class BomonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bomons = Bomon::orderBy('created_at', 'desc')->get();
        return view('bomon.index', compact('bomons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $khoas = Khoa::all();
        return view('bomon.create', compact('khoas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'MaBoMon' => 'required|string|max:50|unique:bomons',
            'TenBoMon' => 'required|string|max:100',
            'KhoaID' => 'required|exists:khoas,id',
        ]);

        $bomon = new Bomon();
        $bomon->MaBoMon = $request->MaBoMon;
        $bomon->TenBoMon = $request->TenBoMon;
        $bomon->KhoaID = $request->KhoaID;
        $bomon->save();

        return redirect()->route('bomon.index')->with('success', 'Bộ môn created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the Bomon and its associated Nganhhocs
        $bomon = Bomon::with('nganhhocs')->findOrFail($id);

        // Pass the data to the view
        return view('bomon.show', compact('bomon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bomon = Bomon::findOrFail($id);
        $khoas = Khoa::all();
        return view('bomon.edit', compact('bomon', 'khoas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'MaBoMon' => 'required|string|max:50|unique:bomons,MaBoMon,' . $id,
            'TenBoMon' => 'required|string|max:100',
            'KhoaID' => 'required|exists:khoas,id',
        ]);

        $bomon = Bomon::findOrFail($id);
        $bomon->MaBoMon = $request->MaBoMon;
        $bomon->TenBoMon = $request->TenBoMon;
        $bomon->KhoaID = $request->KhoaID;
        $bomon->save();

        return redirect()->route('bomon.index')->with('success', 'Bộ môn updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bomon = Bomon::findOrFail($id);
        $bomon->delete();

        return redirect()->route('bomon.index')->with('success', 'Bộ môn deleted successfully.');
    }
}
