<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingradient extends Model
{
    public function products() {
        return $this->belongsToMany(Product::class, 'product_ingradient', 'ingradient_id', 'product_id', 'id', 'id');
    }
}
