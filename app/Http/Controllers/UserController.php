<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:150',
        'username' => 'required|string|max:15|unique:users',
        'level' => 'required|in:user,admin',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ]);

    // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Simpan data user baru
    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'level' => $request->level,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('kelolauser')->with('success', 'User berhasil ditambahkan.');
}

    public function index()
    {
        // Mengambil data semua user
        $datauser = User::all();

        // Menampilkan view kelolauser dengan data user
        return view('kelolauser', compact('datauser'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edituser', compact('user'));
    }

    Public function update(Request $request, $id)
    {
        $user = User::find($id);
    
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:150',
            'username' => 'required|string|max:15|unique:users,username,'.$user->id,
            'level' => 'required|in:user,admin',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8',
        ]);
    
        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Update data user
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'level' => $request->level,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);
    
        return redirect()->route('kelolauser')->with('success', 'User berhasil diperbarui.');
    }

    // Method destroy di UserController
    public function destroy($id)
    {
        dd($id);  // Debugging untuk memastikan ID diterima
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('kelolauser')->with('success', 'User berhasil dihapus');
        }
        return redirect()->route('kelolauser')->with('error', 'User tidak ditemukan');
    }
    



}