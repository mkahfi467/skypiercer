<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelType extends Model {
    use HasFactory;

    public function hotel() {
        return $this->hasMany(Hotel::class);
    }
}
