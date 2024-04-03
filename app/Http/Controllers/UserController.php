<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{

    // method untuk menampilkan halaman daftar user
    public function index()
    {
        $user= User::orderBy('id', 'DESC')->get();
        return view('pages.dataUser',[
            'user' => $user,
        ]);
    }

    // method untuk menampilkan halaman tambah user
    public function create()
    {
        return view('pages.create');
    }

    // method untuk menyimpan data user baru
    public function store(Request $request): RedirectResponse
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User baru berhasil ditambahkan');

    }

    // method untuk menampilkan halaman edit user
    public function edit ($id){
        $user = User::findOrFail($id);
        return view('pages.edit', [
            'user' => $user,
        ]);
    }

    // method untuk mengupdate data user
    public function update ($id, Request $request){
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil di update');

    }

    // method untuk menghapus data user
    public function destroy ($id){
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil di hapus');

    }
}
