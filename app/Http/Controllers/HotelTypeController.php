<?php

namespace App\Http\Controllers;

use App\Models\HotelType;
use Illuminate\Http\Request;

class HotelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rs = HotelType::all();
        return view('HotelType.index', ['rs' => $rs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('HotelType.formcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new HotelType();
        $data->name = $request->get('name');
        $data->save();
        return redirect()->route('HotelType.index')->with('status', 'Data berhasil ditambah !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelType $hotelType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelType $hotelType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelType $hotelType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelType $hotelType)
    {
        //
    }
}
