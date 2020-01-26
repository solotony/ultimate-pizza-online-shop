<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    protected  $table = 'products';

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

    public function subcategories() {
        return $this->belongsToMany(Subcategory::class, 'subcategory_topping', 'topping_id','subcategory_id',  'id', 'id');
    }

    public function mainunit() {
        return $this->hasOne(Unit::class, 'product_id', 'id');
    }
}
