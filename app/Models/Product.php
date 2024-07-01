<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function type() {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }

    public function facility(){
        return $this->belongsToMany(Facility::class);
    }

    public function transaction(){
        return $this->belongsToMany(Transaction::class);
    }

    public function insertFacilitys($facility, $product_id) {
        // $total = 0;
        foreach ($facility as $f) {
            # code...
            // $subtotal = $f['quantity'] * $f['price'];
            // $total += $subtotal;
            // $this->products()->attach($c['id'], ['quantity' => $c['quantity'], 'subtotal' => $subtotal]);
            $this->facility()->attach(['facility_id' => $f]);
        }
    }
}
