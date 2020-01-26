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
        return $this->belongsToMany(Topping::class, 'subcategory_topping', 'subcategory_id', 'topping_id',  'id', 'id');
    }
}
