<?php

namespace App\Http\Controllers;

use App\Models\TDS;
use Illuminate\Http\Request;

class TDSController extends Controller
{
    
    public function tampiltds()
    {
        $datatds = TDS::paginate(10);
        return view('nilaiTDS')->with('datatds', $datatds);
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function show(TDS $tDS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TDS $tDS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TDS $tDS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TDS $tDS)
    {
        //
    }
}