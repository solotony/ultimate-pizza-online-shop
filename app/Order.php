<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_DRAFT = 0;
    const STATUS_CREATED = 1;
    const STATUS_CONFIRMED = 2;
    const STATUS_READY = 3;
    const STATUS_DELIVERED = 4;

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

    /////////////////////////////////////////////////

    public function add(int $unit_id, $count, array $toppings) {
        /**
         * @var \App\Item $item
         */
        $item_ok = null;
        foreach ($this->items as $item) {
            if ($item->unit_id === $unit_id) {
                $item_ok = $item;
                $item_ok->qty = $count;
                $item_ok->save();
                break;
            }
        }

        if (!$item_ok) {
            $unit = Unit::query()
                ->where('id', $unit_id)
                ->where('instock', true)
                ->first();
            if (!$unit) {
                // TODO ERROR PROCESSING
                return;
            }

            $item_ok = new Item;
            $item_ok->qty = $count;
            $item_ok->order_id = $this->id;
            $item_ok->unit_id = $unit_id;
            $item_ok->related_id = null;
            $item_ok->price = $unit->price;
            $item_ok->amount = $unit->price;
            $item_ok->save();

            foreach ($toppings as $topping_id) {
                $unit = Unit::query()
                    ->where('id', $topping_id)
                    ->where('instock', true)
                    ->first();
                if (!$unit) {
                    // TODO ERROR PROCESSING
                    return;
                }
                $topping = new Item;
                $topping->qty = 1;
                $topping->order_id = $this->id;
                $topping->unit_id = $unit_id;
                $topping->related_id = $item_ok;
                $topping->price = $unit->price;
                $topping->amount = $unit->price;
                $topping->save();
            }
        }
    }

    public function increment(int $item_id) {
        /**
         * @var \App\Item $item
         */
        foreach ($this->items as $item) {
            if ($item->id === $item_id) {
                $item->qty += 1;
                $item->save();
            }
        }
    }

    public function decrement(int $item_id) {
        /**
         * @var \App\Item $item
         */
        foreach ($this->items as $item) {
            if ($item->id === $item_id) {
                $item->qty -= 1;
                if ($item->qty > 0) {
                    $item->save();
                    return;
                }
                else {
                    $item->delete();
                    return;
                }
            }
        }
    }

    public function set(int $item_id, int $count) {
        foreach ($this->items as $item) {
            if ($item->id === $item_id) {
                if ($count > 0) {
                    $item->qty = $count;
                    $item->save();
                }
                else {
                    $item->delete();
                }
            }
        }
    }


}
