<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer() {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function courier() {
        return $this->belongsTo(User::class, 'courier_id', 'id');
    }

    public function shop() {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function items() {
        return $this->hasMany(Item::class, 'order_id', 'id');
    }

    public function operations() {
        return $this->hasMany(Operation::class, 'order_id', 'id');
    }
}
