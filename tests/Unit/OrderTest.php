<?php

namespace Tests\Unit;

use App\Order;

class OrderTest extends \Tests\TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $order = new Order;
        $order->save();
        $this->assertInstanceOf('App\Order', $order);

        $order_id = $order->id;

        $res = $order->add(8, 2, [1,2,3]);
        $this->assertTrue($res);

        $order = Order::query()
            ->where('id', $order_id)
            ->with('items')
            ->with('items.unit')
            ->with('items.unit.product')
            ->with('items_main')
            ->with('items_main.unit')
            ->with('items_main.unit.product')
            ->with('items_main.toppings')
            ->first();

        $this->assertInstanceOf('App\Order', $order);

        $this->assertCount(4, $order->items);
        $this->assertCount(1, $order->items_main);

        $res = $order->add(9, 3, [5,6]);
        $this->assertTrue($res);

        $order = Order::query()
            ->where('id', $order_id)
            ->with('items')
            ->with('items.unit')
            ->with('items.unit.product')
            ->with('items_main')
            ->with('items_main.unit')
            ->with('items_main.unit.product')
            ->with('items_main.toppings')
            ->first();

        $this->assertInstanceOf('App\Order', $order);

        $this->assertCount(7, $order->items);
        $this->assertCount(2, $order->items_main);

        foreach ($order->items_main as $i) {

            if ($i->unit_id === 8 ) {
                $this->assertCount(3, $i->toppings);
            }
            elseif ($i->unit_id === 9 ) {
                $this->assertCount(2, $i->toppings);
            }
            else {
                $this->assertTrue(false);
            }
        }

    }
}
