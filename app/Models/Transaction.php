<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product() {
        return $this->belongsToMany(Product::class, 'product_transaction', 'transaction_id', 'product_id')->withPivot('quantity', 'price');
    }

    public function insertProducts($cart, $user) {
        // $total = 0;
        foreach ($cart as $c) {
            # code...
            // $subtotal = $c['quantity'] * $c['price'];
            // $total += $subtotal;
            $this->product()->attach($c['id'], ['quantity' => $c['quantity'], 'price' => $c['price']]);
        }
    }
}
