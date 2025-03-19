<?php

namespace App\Http\Controllers;

use App\Models\chuandaura;
use App\Models\Hocphan;
use Illuminate\Http\Request;

class ChuandauraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chuandauras = chuandaura::all();
        return view('chuandaura.index', compact('chuandauras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hocphans = Hocphan::all();
        return view('chuandaura.create', compact('hocphans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hocphan_id' => 'required|exists:hocphans,id',
            'T1' => 'nullable|string',
            'T2' => 'nullable|string',
            'T3' => 'nullable|string',
            'T4' => 'nullable|string',
            'T5' => 'nullable|string',
            'T6' => 'nullable|string',
            'T7' => 'nullable|string',
            'T8' => 'nullable|string',
        ]);

        $chuandaura = new chuandaura();
        $chuandaura->hocphan_id = $request->hocphan_id;
        $chuandaura->T1 = $request->T1;
        $chuandaura->T2 = $request->T2;
        $chuandaura->T3 = $request->T3;
        $chuandaura->T4 = $request->T4;
        $chuandaura->T5 = $request->T5;
        $chuandaura->T6 = $request->T6;
        $chuandaura->T7 = $request->T7;
        $chuandaura->T8 = $request->T8;
        $chuandaura->save();

        return redirect()->route('chuandaura.index')->with('success', 'Chuẩn đầu ra created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(chuandaura $chuandaura)
    {
        return view('chuandaura.show', compact('chuandaura'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $chuandaura = chuandaura::findOrFail($id);
        $hocphans = Hocphan::all();
        return view('chuandaura.edit', compact('chuandaura', 'hocphans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hocphan_id' => 'required|exists:hocphans,id',
            'T1' => 'nullable|string',
            'T2' => 'nullable|string',
            'T3' => 'nullable|string',
            'T4' => 'nullable|string',
            'T5' => 'nullable|string',
            'T6' => 'nullable|string',
            'T7' => 'nullable|string',
            'T8' => 'nullable|string',
        ]);

        $chuandaura = chuandaura::findOrFail($id);
        $chuandaura->hocphan_id = $request->hocphan_id;
        $chuandaura->T1 = $request->T1;
        $chuandaura->T2 = $request->T2;
        $chuandaura->T3 = $request->T3;
        $chuandaura->T4 = $request->T4;
        $chuandaura->T5 = $request->T5;
        $chuandaura->T6 = $request->T6;
        $chuandaura->T7 = $request->T7;
        $chuandaura->T8 = $request->T8;
        $chuandaura->save();

        return redirect()->route('chuandaura.index')->with('success', 'Chuẩn đầu ra updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $chuandaura = chuandaura::findOrFail($id);
        $chuandaura->delete();
        return redirect()->route('chuandaura.index')->with('success', 'Chuẩn đầu ra deleted successfully.');
    }
}
