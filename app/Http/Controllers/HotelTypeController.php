<?php

namespace App\Http\Controllers;

use App\Models\HotelType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelTypeController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
        $rs = HotelType::all();
        // dd($rs);
        return view('HotelTypes.index', ['rs' => $rs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
        return view('hotelTypes.formcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
        $data = new HotelType();
        $data->name = $request->get('name');
        $data->save();
        return redirect()->route('hotel_types.index')->with('status', 'Data berhasil ditambah !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelType $hotelType) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelType $hotelType) {
        //
        $rs = $hotelType;
        // dd($rs);
        // return view('hotelTypes.formedit', ['rs' => 'hotelType']);
        return view('HotelTypes.formedit', compact('rs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelType $hotelType) {
        //
        $updatedData = $hotelType;
        $updatedData->name = $request->name;
        $updatedData->save();
        return redirect()->route('hotel_types.index')->with('status', 'Data anda sudah terupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelType $hotelType) {
        //
        $user = Auth::user();
        // dd($user);
        // $this->authorize('delete-permission', $user);

        try {
            //if no contraint error, then delete data. Redirect to index after it.
            $deletedData = $hotelType;
            $deletedData->delete();
            return redirect()->route('hotel_types.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\PDOException $ex) {
            // Failed to delete data, then show exception message
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('hotel_types.index')->with('statusEror', $msg);
        }
    }
}
