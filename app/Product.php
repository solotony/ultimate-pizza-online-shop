<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function subcategory() {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function units() {
        return $this->hasMany(Unit::class, 'product_id', 'id');
    }

    public function units_instock() {
        return $this->units()->where('instock', true);
    }

    public function ingradients() {
        return $this->belongsToMany(Ingradient::class, 'product_ingradient', 'product_id','ingradient_id',  'id', 'id');
    }
}
