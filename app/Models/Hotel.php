<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model {
    use HasFactory;

    public function type() {
        return $this->belongsTo(HotelType::class, 'hotel_type_id');
    }

    public function product() {
        return $this->hasMany(Product::class);
    }
}
