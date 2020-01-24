<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    protected  $table = 'products';

    public function subcategories() {
        return $this->belongsToMany(Subcategory::class, 'subcategory_topping', 'subcategory_id', 'topping_id', 'id', 'id');
    }

    public function units() {
        return $this->hasMany(Unit::class, 'product_id', 'id');
    }

    public function unit() {
        return $this->hasOne(Unit::class, 'product_id', 'id')->limit(1);
    }
}
