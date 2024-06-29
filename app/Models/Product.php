<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function type() {
        return $this->belongsTo(ProductType::class);
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
}
