<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function products() {
        return $this->hasMany(Product::class, 'subcategory_id', 'id');
    }

    public function products_instock() {
        return $this->products()->where('instock', true);
    }

    public function toppings() {
        return $this->belongsToMany(Subcategory::class, 'subcategory_topping', 'topping_id', 'subcategory_id', 'id', 'id');
    }
}
