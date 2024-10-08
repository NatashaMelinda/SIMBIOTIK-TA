<?php

namespace App\Exports;

use App\Models\suhuair;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuhuairExport implements FromCollection
{
    public function collection()
    {
        // // Contoh pengecekan data sebelum diekspor
        // $data = suhuair::all();
        // dd($data); // Dump data untuk memeriksanya sebelum diekspor

        // return $data;
        $data = suhuair::paginate(5);
        return $data;
    }
}