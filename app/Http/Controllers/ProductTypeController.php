<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductTypeController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
        $rs = ProductType::all();
        return view('productTypes.index', ['rs' => $rs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
        return view('productTypes.formcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
        $data = new ProductType();
        $data->name = $request->get('name');
        $data->save();
        return redirect()->route('product_types.index')->with('status', 'Data berhasil ditambah !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $productType) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductType $productType) {
        //
        $rs = $productType;
        return view('productTypes.formedit', compact('rs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductType $productType) {
        //
        $updatedData = $productType;
        $updatedData->name = $request->name;
        $updatedData->save();
        return redirect()->route('product_types.index')->with('status', 'Data anda sudah terupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $productType) {
        //
        $user = Auth::user();
        // dd($user);
        // $this->authorize('delete-permission', $user);

        try {
            //if no contraint error, then delete data. Redirect to index after it.
            $deletedData = $productType;
            $deletedData->delete();
            return redirect()->route('product_types.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\PDOException $ex) {
            // Failed to delete data, then show exception message
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('product_types.index')->with('statusEror', $msg);
        }
    }
}
