<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function orders() {
        return $this->hasMany(Order::class, 'shop_id', 'id');
    }
}
