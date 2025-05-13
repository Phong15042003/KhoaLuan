<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('vaitro')) {
            $query->where('vaitro', $request->input('vaitro'));
        }

        // Exclude the user with id=1 and the currently authenticated user
        $query->where('id', '!=', 1)
              ->where('id', '!=', auth()->id());

        $users = $query->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        
        
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'vaitro' => 'required|in:sinhvien,admin,biensoan,chunhiem,giangvien',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->vaitro= $request->vaitro;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'vaitro' => 'required|in:sinhvien,admin,biensoan,chunhiem,giangvien',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->vaitro = $request->input('vaitro');
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }

       public function show($id)
    {
        // Fetch the user
        $user = User::findOrFail($id);

        // Initialize an empty collection for decuongchitiets
        $decuongchitiets = collect();

        // If the user is a giangvien, fetch their assigned decuongchitiets
        if ($user->vaitro === 'giangvien') {
            $decuongchitiets = \App\Models\Decuongchitiet::whereHas('hocphan.phancongmonhocs', function ($query) use ($user) {
                $query->where('giangvien_id', $user->id);
            })->get();
        }

        // Pass the user and decuongchitiets to the view
        return view('users.show', compact('user', 'decuongchitiets'));
    }

    

    //excel
    public function excelForm()
    {
        return view('users.excel');
    }
    
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
    
        Excel::import(new UsersImport, $request->file('file'));
    
        return redirect()->route('users.index')->with('success', 'Import thành công.');
    }
}
