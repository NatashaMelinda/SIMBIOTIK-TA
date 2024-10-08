<?php

namespace App\Exports;

use App\Models\phair;
use Maatwebsite\Excel\Concerns\FromCollection;

class PHairExport implements FromCollection
{
    public function collection()
    {
        // // Contoh pengecekan data sebelum diekspor
        // $data = suhuair::all();
        // dd($data); // Dump data untuk memeriksanya sebelum diekspor

        // return $data;
        $dataph = phair::paginate(5);
        return $dataph;
    }
}