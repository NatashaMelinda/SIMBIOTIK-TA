<?php

namespace App\Http\Controllers;

use App\Models\suhuair;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SuhuairExport;


class SuhuairController extends Controller
{
    public function tampilsuhu()
    {
        $data = suhuair::paginate(7);
        return view('nilaisuhuair')->with('data', $data);
    }
    public function create()
    {
        // $data = suhuair::all();
        // return $data;
    }

    // public function insertsuhu()
    // {
    //     $result = suhuair::create(
    //         [
    //             'nilai_suhu' => '30',  
    //         ]
    //     );
    //     dump($result);  
    // }

    public function storesuhu(Request $request)
    {
        $validateData = $request->validate([
            'nilai_suhu' => 'required'
        ]);
        dump($validateData);
    }

    public function export()
    {
        return Excel::download(new SuhuairExport, 'nilaisuhuair.xlsx');
    }

}