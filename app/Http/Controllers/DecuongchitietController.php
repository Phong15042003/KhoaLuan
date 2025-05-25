<?php

namespace App\Http\Controllers;

use App\Models\Decuongchitiet;
use App\Models\Hocphan;
use App\Models\Phancongmonhoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class DecuongchitietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if (in_array($user->vaitro, ['giangvien', 'biensoan', 'chunhiem', 'sinhvien'])) {

            $decuongchitiets = Decuongchitiet::whereHas('hocphan.phancongmonhocs', function ($query) use ($user) {
                $query->where('giangvien_id', $user->id);
            })->orderBy('created_at', 'desc')->get();
        } else {
            
            $decuongchitiets = Decuongchitiet::orderBy('created_at', 'desc')->get();
        }
        $user = Auth::user();
        if ($user->vaitro === 'giangvien') {
            
            $decuongchitiets = Decuongchitiet::whereHas('hocphan.phancongmonhocs', function ($query) use ($user) {
                $query->where('giangvien_id', $user->id);
            })->orderBy('created_at', 'desc')->get();
        } else {
            
            $decuongchitiets = Decuongchitiet::orderBy('created_at', 'desc')->get();
        }

        return view('decuongchitiet.index', compact('decuongchitiets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->vaitro !== 'giangvien') {
            abort(403, 'Bạn không có quyền truy cập trang này.');
        }

        $hocphans = Hocphan::whereHas('phancongmonhocs', function ($query) use ($user) {
            $query->where('giangvien_id', $user->id);
        })->get();

        return view('decuongchitiet.create', compact('hocphans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->vaitro !== 'giangvien') {
            abort(403, 'Bạn không có quyền truy cập trang này.');
        }

        $request->validate([
            'HocPhanID' => 'required|exists:hocphans,id',
            'NoiDung' => 'required|string',
        ]);

        // loc nhung hoc phan da duoc phan cong
        $hocphan = Hocphan::whereHas('phancongmonhocs', function ($query) use ($user) {
            $query->where('giangvien_id', $user->id);
        })->findOrFail($request->HocPhanID);

        $decuongchitiet = new Decuongchitiet();
        $decuongchitiet->HocPhanID = $request->HocPhanID;
        $decuongchitiet->NoiDung = $request->NoiDung;
        $decuongchitiet->save();

        return redirect()->route('decuongchitiet.index')->with('success', 'Đã thêm đề cương.');
    }

  
    public function show($id)
    {
        $decuongchitiet = Decuongchitiet::findOrFail($id);
        return view('decuongchitiet.show', compact('decuongchitiet'));
    }

  
    public function edit($id)
    {
        $decuongchitiet = Decuongchitiet::findOrFail($id);
        $hocphans = Hocphan::all();
        return view('decuongchitiet.edit', compact('decuongchitiet', 'hocphans'));
    }

   
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

        return redirect()->route('decuongchitiet.index')->with('success', 'Đã cập nhật.');
    }

  
    public function destroy($id)
    {
        $decuongchitiet = Decuongchitiet::findOrFail($id);
        $decuongchitiet->delete();

        return redirect()->route('decuongchitiet.index')->with('success', 'Đã xóa.');
    }
    //xuat pdf
    public function exportPDF($id)
{
    $decuongchitiet = Decuongchitiet::with('hocphan.khoikienthuc')->findOrFail($id);
    $pdf = Pdf::loadView('decuongchitiet.pdf', compact('decuongchitiet'));
    return $pdf->stream('decuong_'.$decuongchitiet->hocphan->MaHocPhan.'.pdf');
}
}
