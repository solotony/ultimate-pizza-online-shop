<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function related() {
        return $this->belongsTo(Item::class, 'related_id', 'id');
    }

}
