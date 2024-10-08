<?php

namespace App\Http\Controllers;

use App\Exports\TinggiairExport;
use App\Models\tinggiair;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TinggiairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampiltinggi()
    {
        $datatinggi = tinggiair::paginate(10);
        return view('nilaitinggiair')->with('datatinggi', $datatinggi);
    }

    /**
     * Show the form for creating a new resource.
     */

    // public function inserttinggi()
    // {
    //     $result = tinggiair::create(
    //         [
    //             'tinggi_air' => '15',  
    //         ]
    //     );
    //     dump($result);  
    // }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tinggiair $tinggiair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tinggiair $tinggiair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tinggiair $tinggiair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tinggiair $tinggiair)
    {
        //
    }

    public function exporttinggi()
    {
        return Excel::download(new TinggiairExport, 'NilaiTinggiAir.xlsx');
    }
}