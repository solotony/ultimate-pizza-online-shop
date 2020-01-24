<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
