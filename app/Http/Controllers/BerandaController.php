<?php

namespace App\Http\Controllers;

use App\Models\suhuair;
use App\Models\TDS;
use App\Models\tinggiair;
use App\Models\phair;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    

    public function dashboard() {
        return view('dashboard');
    }
    public function control() {
        return view('control');
    }

    // public function kelolauser() {
    //     return view('kelolauser');
    // }
    
    // }

    public function index() {
        return view('index');
    }
    public function dashboard2() {
        // Ambil nilai suhu terbaru dari sumber data
        $latestSuhuAir = suhuair::latest()->value('nilai_suhu');

        // Ambil nilai Tinggi terbaru dari sumber data
        $latestTinggiAir = tinggiair::latest()->value('tinggi_air');

        // Ambil nilai pH terbaru dari sumber data
        $latestpHAir = pHair::latest()->value('nilai_pH');

        // Ambil nilai pH terbaru dari sumber data
        $latestTDS = TDS::latest()->value('nilai_TDS');


        // Kirim kedua nilai tersebut ke dalam view
        return view('dashboard2', compact('latestSuhuAir', 'latestTinggiAir','latestpHAir','latestTDS'));
    }
    public function control2()
    {
        // return view('control2');

        // Ambil nilai suhu terbaru dari sumber data
        $latestSuhuAir = suhuair::latest()->value('nilai_suhu');

        // Ambil nilai Tinggi terbaru dari sumber data
        $latestTinggiAir = tinggiair::latest()->value('tinggi_air');

        // Ambil nilai pH terbaru dari sumber data
        $latestpHAir = phair::latest()->value('nilai_pH');
        
        // Ambil nilai TDS terbaru dari sumber data
        $latestTDS = TDS::latest()->value('nilai_TDS');

        // Kirim kedua nilai tersebut ke dalam view
        return view('control2', compact('latestSuhuAir', 'latestTinggiAir','latestpHAir','latestTDS'));
    }

    public function accsetting() {
        return view('accsetting');
    }


//Kelola User
    public function kelolauser(){
        $datauser = User::paginate(10);
        return view('kelolauser')->with('datauser', $datauser);
    }

    // public function destroy($id){
    // $datauser = User::findOrFail($id);
    // $datauser->delete();

    // return redirect()->route('kelolauser')->with('success', 'User deleted successfully');
    // }

    public function destroy($id)
    {
        // Ambil user yang sedang login
        $currentUser = auth()->user();
    
        // Cek jika user yang sedang login mencoba menghapus dirinya sendiri
        if ($currentUser->id == $id) {
            return redirect()->route('kelolauser')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }
    
        // Cari user berdasarkan ID
        $user = User::find($id);
    
        // Jika user tidak ditemukan
        if (!$user) {
            return redirect()->route('kelolauser')->with('error', 'Data tidak ditemukan.');
        }
    
        // Hapus user
        $user->delete();
    
        return redirect()->route('kelolauser')->with('success', 'Data berhasil dihapus.');
    }
    


    public function profile() {
        return view('profile');
    }
}