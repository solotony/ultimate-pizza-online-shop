<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Order;
use App\Product;
use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
        $request->session()->put('order', $order->id);
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

       // unit:this.unit, qty:this.qty, toppings:this.toppings

        $count = $request->qty;
        $toppings = $request->toppings;
        $data = json_decode($request->data);
        $order->add($data->unit, $data->qty, $data->toppings);
        return  $this->show($request);
    }

    /**
     * AJAX
     * @param Request $request
     * @param int $item_id
     */
    public function dec(Request $request, int $item_id) {
        $order = $this->getOrder($request);
        $order->dec($item_id);
        return  $this->show($request);
    }

    /**
     * AJAX
     * @param Request $request
     * @param int $item_id
     */
    public function inc(Request $request, int $item_id) {
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
        $order_id = $request->session()->get('order');
        if (!$order_id) {
            return ['status'=>0];
        }
        $order = Order::query()
            ->where('id', $order_id)
            ->with('items')
            ->first();
        if (!$order_id) {
            //TODO ERROR PROCESSING
            return ['status'=>0];
        }
        return ['status'=>1, 'cart'=>$order];
    }

    public function product(Request $request, $product_id) {
        $order = Product::query()
            ->where('id', $product_id)
            ->where('instock', true)
            ->with('units_instock')
            ->with('ingradients')
            ->with('subcategory')
            ->with('subcategory.category')
            ->with('subcategory.toppings')
            ->with('subcategory.toppings.mainunit')
            // TODO CONTROL MAINUNIT EXISTS
            ->first();
        if (!$order) {
            //TODO ERROR PROCESSING
            return ['status'=>0];
        }
        return ['status'=>1, 'product'=>$order];
    }

    public function currency(Request $request) {
        $sel_currency_id = session()->get('currency', config('pizza.main_currency'));
        $sel_currency = Currency::query()->where('id', $sel_currency_id)->first();

        return ['status'=>1, 'currency'=>$sel_currency];
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
        $shops = Shop::query()->get();

        return view('cart_checkout', [
            'order' => $order,
            'shops'=>$shops
        ]);
    }


    public function show_order(Request $request) {

        $order = Order::query()->where('id', $request->order_id)->first();

        return view('show_order', [
            'order_id' => $request->order_id,
            'order' => $order,
        ]);
    }


    /**
     * @param Request $request
     */
    public function finish(Request $request) {
        $order = $this->getOrder($request);

        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|max:100',
            'phone' => 'required|max:30',
            'email' => 'required|max:60',
            'address' => 'required_if:method,1|max:500',
            'delivery_comment' => 'max:500',
            'delivery_method' => 'required|integer|in:1,2',
            'shop' => 'required_if:method,2|integer|exists:shops,id',
            'time_of_delivery' => 'required|integer|max:23|min:0',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $user = new User;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make('qwerty');
            $user->save();
        }

        $order->customer_id = $user->id;
        $order->shop_id = $request->shop;
        $order->status = Order::STATUS_CREATED;
        $order->method = $request->delivery_method;
        $order->amount = $order->calculate_total();
        $order->address = $request->address;
        $order->delivery_comment = $request->delivery_comment;
        $order->currency_id = session()->get('currency', config('pizza.main_currency'));
        $order->time_of_delivery = \Carbon\Carbon::now(config('app.timezone'))->addHour($request->time_of_delivery + 1)->startOfHour();
        $order->save();

        $request->session()->remove('order');

        return view('cart_finished', [
            'order' => $order
        ]);
    }
}
