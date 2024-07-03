<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller {
    //
    public function index() {
        //
        $products = Product::all();
        return view('frontend.index', compact('products'));
    }

    public function show($id) {
        //
        $product = Product::find($id);
        return view('frontend.product-detail', compact('product'));
    }

    // public function cart() {
    //     $point = Auth::user()->point;
    //     return view('frontend.cart', ['point' => $point]);
    // }

    public function addToCart($id) {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (!isset($cart[$id])) {
            $cart[$id] = [
                'id' => $id,
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'photo' => $product->image,
            ];
        } else {
            $cart[$id]['quantity']++;
        }
        session()->put('cart', $cart);
        return redirect()->back()->with("status", "Produk Telah ditambahkan ke Cart");
    }

    // public function cart() {
    //     return view('frontend.cart');
    // }

    public function addQuantity(Request $request) {
        $id = $request->id;
        $cart = session()->get('cart');
        $product = Product::find($cart[$id]['id']);
        if (isset($cart[$id])) {
            $jumlahAwal = $cart[$id]['quantity'];
            $jumlahPesan = $jumlahAwal + 1;
            // if ($jumlahPesan < $product->available_room) {
            //     $cart[$id]['quantity']++;
            // } else {
            //     return redirect()->back()->with('error', 'Jumlah pemesanan melebihi total kamar yang tersedia');
            // }
            $cart[$id]['quantity']++;
        }
        session()->forget('cart');
        session()->put('cart', $cart);
    }
    public function reduceQuantity(Request $request) {
        $id = $request->id;
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 0) {
                $cart[$id]['quantity']--;
            }
        }
        session()->forget('cart');
        session()->put('cart', $cart);
    }

    public function deleteFromCart($id) {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->forget('cart');
        session()->put('cart', $cart);
        return redirect()->back()->with("status", "Produk Telah dibuang dari Cart");
    }

    public function checkout() {
        $cart = session('cart');
        $user = Auth::user();

        $totalPrice = 0;
        foreach ($cart as $c) {
            $totalPrice += $c['price'] * $c['quantity'];
        }

        $t = new Transaction();
        $t->user_id = $user->id;
        $t->total = $totalPrice * 1.11;
        $t->save();
        $t->insertProducts($cart, $user);
        session()->forget('cart');
        session()->forget('point');
        return redirect()->route('laralux.index')->with('status', 'Checkout berhasil');
    }
}
