<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function postLogin(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string', // Ubah 'email' menjadi 'username'
            'password' => 'required|min:6',
        ]);

        // Jika validasi gagal, redirect kembali dengan pesan error
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        // Autentikasi pengguna
        if (Auth::attempt([
            'username' => $request->username, // Autentikasi berdasarkan 'name'
            'password' => $request->password
        ])) {
            $user = Auth::user();
            $name = $user->name;
            // Simpan nama lengkap dalam session
            $request->session()->put('name', $name);

            // Jika login berhasil, redirect ke halaman utama
            return redirect()->intended('dashboard2')->with('success', 'Halo ' . $name . ', Login SIMBIOTIK Succses.'); // Ganti dengan rute yang sesuai
        }

        // Jika login gagal, redirect kembali dengan pesan error
        return redirect('/')
            ->withErrors(['username' => 'Username atau Password salah'])
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }
}