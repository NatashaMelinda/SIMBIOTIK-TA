<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SensorDataController extends Controller
{
    public function getData()
    {
        // Ambil data dari tabel suhuair
        $data = DB::table('suhuairs')
            ->select(DB::raw('DATE(created_at) as day'), 'nilai_suhu')
            ->orderBy('created_at')
            ->get();

        // Format data untuk grafik
        $formattedData = $data->map(function ($item) {
            return [
                'day' => strtotime($item->day) * 1000, // Konversi ke timestamp dalam milidetik
                'nilai_suhu' => $item->nilai_suhu
            ];
        });

        return response()->json($formattedData);
    }

    public function getAllSuhuData()
    {
        // Mengambil data suhu dengan waktu dikonversi ke timestamp dalam milidetik
        $data = DB::table('suhuairs')
            ->select('created_at as time', 'nilai_suhu as nilai_suhu')
            ->orderBy('created_at')
            ->get();

        return response()->json($data);
    }
}