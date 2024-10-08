<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountSettingController extends Controller
{
    public function saveSettings(Request $request)
    {
        // Validasi data input, jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'nullable|string|min:8',
            'gender' => 'required|in:Male,Female',
            'birthdate' => 'required|date_format:d/m/Y',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:200',
            'about' => 'nullable|string',
        ]);

        // Ambil data dari formulir
        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $gender = $validatedData['gender'];
        $birthdate = \Carbon\Carbon::createFromFormat('d/m/Y', $validatedData['birthdate'])->format('Y-m-d');
        $phone = $validatedData['phone'];
        $address = $validatedData['address'];
        $about = $validatedData['about'];

        // Simpan data ke dalam database atau lakukan aksi sesuai kebutuhan aplikasi
        $user = auth()->user(); // Sesuaikan dengan cara Anda mendapatkan data pengguna yang sedang login
        $user->name = $name;
        $user->email = $email;
        $user->gender = $gender;
        $user->birthdate = $birthdate;
        $user->phone = $phone;
        $user->address = $address;
        $user->about = $about;

        // Jika menggunakan password
        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        // Redirect atau kembalikan respon ke halaman yang sesuai
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
        
        // dd($request->all());
    }
    
}