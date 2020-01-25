<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class CartController extends Controller
{
    /**
     * @param Request $request
     * @return \App\Order
     */
    protected function getOrder(Request $request) {
        $order_id = $request->session()->get('order');
        $order = null;
        if ($order_id) {
            $order = Order::query()->where('id', $order_id)->first();
            if ($order && $order->status === Order::STATUS_DRAFT) {
                return $order;
            }
        }

        $order = new Order();
        $order->status = Order::STATUS_DRAFT;
        $order->save();
        return $order;
    }

    protected function resetOrder(Request $request) {
        $request->session()->remove('order');
    }

    /**
     * AJAX
     * @param Request $request
     * @param int $unit_id
     */
    public function add(Request $request, int $unit_id) {
        $order = $this->getOrder($request);
        $count = $request->count;
        $toppings = $request->toppings;
        $order->add($unit_id, $count, $toppings);
        return  $this->show($request);
    }

    /**
     * AJAX
     * @param Request $request
     * @param int $item_id
     */
    public function decrement(Request $request, int $item_id) {
        $order = $this->getOrder($request);
        $order->dec($item_id);
        return  $this->show($request);
    }

    /**
     * AJAX
     * @param Request $request
     * @param int $item_id
     */
    public function increment(Request $request, int $item_id) {
        $order = $this->getOrder($request);
        $order->inc($item_id);
        return  $this->show($request);
    }

    /**
     * AJAX
     * @param Request $request
     * @param int $unit_id
     */
    public function set(Request $request, int $item_id) {
        $order = $this->getOrder($request);
        $count = $request->count;
        $order->set($item_id, $count);
        return  $this->show($request);
    }

    /**
     * AJAX
     * @param Request $request
     */
    public function show(Request $request) {
        $order = $this->getOrder($request);
        return $order;
    }


    /**
     * @param Request $request
     */
    public function clear(Request $request) {
        $order = $this->getOrder($request);
        $order->delete();
        $this->resetOrder();
        return redirect(route('front_page'));
    }

    /**
     * @param Request $request
     */
    public function cart(Request $request) {
        $order = $this->getOrder($request);

        return view('cart_show', [
            'order' => $order
        ]);
    }

    /**
     * @param Request $request
     */
    public function checkout(Request $request) {
        $order = $this->getOrder($request);

        return view('cart_checkout', [
            'order' => $order
        ]);
    }

    /**
     * @param Request $request
     */
    public function finish(Request $request) {
        $order = $this->getOrder($request);

        return view('cart_finished', [
            'order' => $order
        ]);
    }
}
