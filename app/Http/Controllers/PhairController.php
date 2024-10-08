<?php

namespace App\Http\Controllers;

use App\Exports\pHairExport;
use App\Models\phair;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PhairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampilph()
    {
        $dataph = phair::paginate(10);
        return view('nilaiphair')->with('dataph', $dataph);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function insertpH()
    // {
    //     // $result = phair::create(
    //     //     [
    //     //         'nilai_pH' => '6',  
    //     //     ]
    //     // );
    //     // dump($result);  
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
        $validateData = $request->validate([
            'nilai_pH' => 'required'
        ]);
        dump($validateData);
    }

    /**
     * Display the specified resource.
     */
    // public function show(phair $phair)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(phair $phair)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, phair $phair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(phair $phair)
    // {
    //     //
    // }

    public function exportpH()
    {
        \Log::info('Metode exportpH dipanggil');
        return Excel::download(new PhairExport, 
        'phair_data.xlsx');
    }
}