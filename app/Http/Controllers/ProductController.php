<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Hotel;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
        $rs = Product::all();
        return view('products.index', ['rs' => $rs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
        $rsHotel = Hotel::all();
        $rsProductType = ProductType::all();
        $rsFacility = Facility::all();
        return view('products.formcreate', ['rsHotel' => $rsHotel, 'rsFacility' => $rsFacility, 'rsProductType' => $rsProductType]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
        // $cart = session('cart');
        // $user = Auth::user();
        $selectedFacilities = $request->input('listFacility', []);
        $p = new Product();
        $p->name = $request->name;
        $p->price = $request->price;
        $p->image = $request->image;
        $p->hotel_id = $request->hotel_id;
        $p->product_type_id = $request->product_type;

        // $p->customer_id = 1; //need to fix later
        // $p->transaction_date = Carbon::now()->toDateTimeString();
        $p->save();
        //insert into junction table product_transaction using eloquent
        $p->insertFacilitys($selectedFacilities, $p->id);
        // session()->forget('cart');
        return redirect()->route('product.index')->with('status', 'Data berhasil ditambah !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) {
        //
        $rs = $product;
        $rsHotel = Hotel::all();
        $rsProductType = ProductType::all();
        $rsFacility = Facility::all();
        return view('products.formedit', ['rs' => $rs, 'rsHotel' => $rsHotel, 'rsFacility' => $rsFacility, 'rsProductType' => $rsProductType]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product) {
        //
        $selectedFacilities = $request->input('listFacility', []);
        $p = $product;
        $p->name = $request->name;
        $p->price = $request->price;
        $p->image = $request->image;
        $p->hotel_id = $request->hotel_id;
        $p->product_type_id = $request->product_type;

        // $p->customer_id = 1; //need to fix later
        // $p->transaction_date = Carbon::now()->toDateTimeString();
        $p->save();
        //insert into junction table product_transaction using eloquent
        // $p->insertFacilitys($selectedFacilities, $p->id);
        // session()->forget('cart');
        $product->facility()->sync($selectedFacilities);
        return redirect()->route('product.index')->with('status', 'Data anda sudah terupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) {
        //
        // $user = Auth::user();
        // $this->authorize('delete', $product);

        try {
            // Delete the product and its related facilities
            $product->facility()->detach(); // Remove all related facilities
            $product->delete(); // Delete the product itself

            return redirect()->route('product.index')->with('status', 'Product deleted successfully!');
        } catch (\Exception $e) {
            // Handle exceptions if deletion fails
            return redirect()->route('product.index')->with('statusEror', 'Failed to delete product.');
        }
    }
}
