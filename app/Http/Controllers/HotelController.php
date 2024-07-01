<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
        $rs = Hotel::all();
        return view('hotels.index', ['rs' => $rs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
        $rs = HotelType::all();
        return view('hotels.formcreate', ['rs' => $rs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
        $data = new Hotel();
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->phone = $request->get('phone');
        $data->email = $request->get('email');
        $data->rating = '0.0';
        $data->hotel_type_id = $request->get('type');
        $data->save();
        return redirect()->route('hotel.index')->with('status', 'Data berhasil ditambah !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel) {
        //
        $rs = $hotel;
        $rsHotelType = HotelType::all();
        return view('hotels.formedit', ['rs' => $rs, 'rsHotelType' => $rsHotelType]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel) {
        //
        $updatedData = $hotel;
        $updatedData->name = $request->get('name');
        $updatedData->address = $request->get('address');
        $updatedData->phone = $request->get('phone');
        $updatedData->email = $request->get('email');
        $updatedData->hotel_type_id = $request->get('type');
        $updatedData->save();
        return redirect()->route('hotel.index')->with('status', 'Data anda sudah terupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel) {
        //
        $user = Auth::user();
        // $this->authorize('delete-permission', $user);

        try {
            //if no contraint error, then delete data. Redirect to index after it.
            $deletedData = $hotel;
            $deletedData->delete();
            return redirect()->route('hotel.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\PDOException $ex) {
            // Failed to delete data, then show exception message
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('hotel.index')->with('statusEror', $msg);
        }
    }
}
