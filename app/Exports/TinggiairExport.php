<?php

namespace App\Exports;

use App\Models\tinggiair;
use Maatwebsite\Excel\Concerns\FromCollection;

class TinggiairExport implements FromCollection
{
    /**
    *
    */
    public function collection()
    {
        $datatinggi = tinggiair::paginate(10);
        return $datatinggi;
    }
}