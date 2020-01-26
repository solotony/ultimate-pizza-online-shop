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

    const METHOD_DELIVERY = 1;
    const METHOD_PICKUP = 2;

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

    public function items_main() {
        return $this->items()->whereNull('related_id');
    }

    public function operations() {
        return $this->hasMany(Operation::class, 'order_id', 'id');
    }

    /////////////////////////////////////////////////

    public function add(int $unit_id, $count, array $toppings) {
        /**
         * @var \App\Item $item
         */

        $unit = Unit::query()
            ->where('id', $unit_id)
            ->where('instock', true)
            ->first();

        if (!$unit) {
            // TODO ERROR PROCESSING
            return false;
        }

        $item = new Item;
        $item->qty = $count;
        $item->order_id = $this->id;
        $item->unit_id = $unit_id;
        $item->related_id = null;
        $item->price = $unit->price;
        $item->amount = $unit->price * $count;
        $item->name = $unit->product->name;
        if ($unit->weight | $unit->size | $unit->volume) {
            $item->name .= ' (';
            if ($unit->weight) {
                $item->name .= ' weight: ' . $unit->weight . ' g';
            }
            if ($unit->size ) {
                $item->name .= ' size: ' . $unit->size . ' cm';
            }
            if ($unit->volume) {
                $item->name .= ' volume: ' . $unit->volume . ' ml';
            }
            $item->name .= ')';
        }

        $item->save();

        foreach ($toppings as $topping_id) {
            $topping_unit = Unit::query()
                ->where('id', $topping_id)
                ->where('instock', true)
                ->first();
            if (!$topping_unit) {
                // TODO ERROR PROCESSING
                return  false;
            }
            $topping_item = new Item;
            $topping_item->qty = $count;
            $topping_item->order_id = $this->id;
            $topping_item->unit_id = $topping_id;
            $topping_item->related_id = $item->id;
            $topping_item->price = $topping_unit->price;
            $topping_item->amount = $topping_unit->price * $count;
            $topping_item->name = $topping_unit->product->name;
            if ($topping_unit->weight | $topping_unit->size | $topping_unit->volume) {
                $topping_item->name .= ' (';
                if ($topping_unit->weight) {
                    $topping_item->name .= ' weight: ' . $topping_unit->weight . ' g';
                }
                if ($topping_unit->size ) {
                    $topping_item->name .= ' size: ' . $topping_unit->size . ' cm';
                }
                if ($topping_unit->volume) {
                    $topping_item->name .= ' volume: ' . $topping_unit->volume . ' ml';
                }
                $topping_item->name .= ')';
            }
            $topping_item->save();
        }
        return true;
    }

    public function inc(int $item_id) {
        /**
         * @var \App\Item $item
         */
        foreach ($this->items as $item) {
            $finded = false;
            if (($item->id === $item_id)||($item->related_id === $item_id)) {
                $item->qty += 1;
                $item->amount = $item->qty * $item->price;
                $item->save();
                $finded = true;
            }
        }
        return $finded;
    }

    public function dec(int $item_id) {
        /**
         * @var \App\Item $item
         */
        foreach ($this->items as $item) {
            $finded = false;
            if (($item->id === $item_id)||($item->related_id === $item_id)) {
                $item->qty -= 1;
                $item->amount = $item->qty * $item->price;
                $finded = true;
                if ($item->qty > 0) {
                    $item->save();
                }
                else {
                    if ($item->id === $item_id) {
                        $item->delete();
                        return true;
                    }
                }
            }
        }
        return $finded;
    }

    public function set(int $item_id, int $count) {
        foreach ($this->items as $item) {
            if ($item->id === $item_id) {
                if ($count > 0) {
                    $item->qty = $count;
                    $item->save();
                    return true;
                }
                else {
                    $item->delete();
                    return true;
                }
            }
        }
        return false;
    }

    public function calculate_total() {
        $t = 0;

        foreach ($this->items as $item) {
            $t += $item->amount;
        }

        return $t;
    }

    public function status_text() {
        switch ($this->status) {
            case self::STATUS_DRAFT: return 'Draft';
            case self::STATUS_CREATED: return 'Created';
            case self::STATUS_CONFIRMED: return 'Confirmed';
            case self::STATUS_READY: return 'Ready';
            case self::STATUS_DELIVERED: return 'Delivered';
        }
    }

    public function method_text() {
        switch ($this->method) {
            case self::METHOD_DELIVERY: return 'Delivery';
            case self::METHOD_PICKUP: return 'Pickup';
        }
    }
}
