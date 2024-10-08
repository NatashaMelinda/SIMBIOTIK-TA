<?php

namespace App\Http\Controllers;

use App\Models\sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    
    public function tampilnilaisensor()
    {
        $datasensor = sensor::paginate(7);
        return view('tabelsensor')->with('datasensor', $datasensor);
        // return view('tabelsensor');
        
    }
    /**
     * Display a listing of the resource.
     */
    public function control()
    {
        $latestSensor = Sensor::latest()->first();
        return view('control2', ['sensor' => $latestSensor]);
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
    public function storesensor(Request $request)
    {
        $validateData = $request->validate([
            'nilai_suhu' => 'required',
            'nilai_pH' => 'required',
            'nilai_tds' => 'required',
            'nilai_tinggi' => 'required',
        ]);
        dump($validateData);
    }

    /**
     * Display the specified resource.
     */
    public function show(sensor $sensor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sensor $sensor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sensor $sensor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sensor $sensor)
    {
        //
    }
}