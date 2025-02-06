<?php

namespace App\Http\Controllers;

use App\Models\nganhhoc;
use App\Models\bomon;
use Illuminate\Http\Request;

class NganhhocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nganhhocs = Nganhhoc::orderBy('created_at', 'desc')->get();
        return view('nganhhoc.index', compact('nganhhocs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bomons = Bomon::all();
        return view('nganhhoc.create', compact('bomons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'MaNganh' => 'required|string|max:50|unique:nganhhocs',
            'TenNganh' => 'required|string|max:100',
            'BoMonID' => 'required|exists:bomons,id',
        ]);

        $nganhhoc = new Nganhhoc();
        $nganhhoc->MaNganh = $request->MaNganh;
        $nganhhoc->TenNganh = $request->TenNganh;
        $nganhhoc->BoMonID = $request->BoMonID;
        $nganhhoc->save();

        return redirect()->route('nganhhoc.index')->with('success', 'Ngành học created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $nganhhoc = Nganhhoc::findOrFail($id);
        return view('nganhhoc.show', compact('nganhhoc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nganhhoc = Nganhhoc::findOrFail($id);
        $bomons = Bomon::all();
        return view('nganhhoc.edit', compact('nganhhoc', 'bomons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'MaNganh' => 'required|string|max:50|unique:nganhhocs,MaNganh,' . $id,
            'TenNganh' => 'required|string|max:100',
            'BoMonID' => 'required|exists:bomons,id',
        ]);

        $nganhhoc = Nganhhoc::findOrFail($id);
        $nganhhoc->MaNganh = $request->MaNganh;
        $nganhhoc->TenNganh = $request->TenNganh;
        $nganhhoc->BoMonID = $request->BoMonID;
        $nganhhoc->save();

        return redirect()->route('nganhhoc.index')->with('success', 'Ngành học updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nganhhoc = Nganhhoc::findOrFail($id);
        $nganhhoc->delete();

        return redirect()->route('nganhhoc.index')->with('success', 'Ngành học deleted successfully.');
    }
}
