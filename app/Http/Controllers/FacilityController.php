<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rs = Facility::all();
        return view('facilitys.index', ['rs' => $rs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('facilitys.formcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new Facility();
        $data->name = $request->get('name');
        $data->description = $request->get('description');
        $data->save();
        return redirect()->route('facility.index')->with('status', 'Data berhasil ditambah !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        //
        $rs = $facility;
        return view('facilitys.formedit', compact('rs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facility)
    {
        //
        $updatedData = $facility;
        $updatedData->name = $request->name;
        $updatedData->description = $request->description;
        $updatedData->save();
        return redirect()->route('facility.index')->with('status', 'Data anda sudah terupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        //
        $user = Auth::user();
        // dd($user);
        // $this->authorize('delete-permission', $user);

        try {
            //if no contraint error, then delete data. Redirect to index after it.
            $deletedData = $facility;
            $deletedData->delete();
            return redirect()->route('facility.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\PDOException $ex) {
            // Failed to delete data, then show exception message
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('facility.index')->with('statusEror', $msg);
        }
    }
}
