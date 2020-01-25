<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function unit() {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function related() {
        return $this->belongsTo(Item::class, 'related_id', 'id');
    }

    public function toppings() {
        return $this->hasMany(Item::class, 'related_id', 'id');
    }

}
