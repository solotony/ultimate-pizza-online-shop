<?php

namespace App\Http\Controllers;

use App\Category;
use App\Currency;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function front(Request $request) {
        $categories = Category::query()->get();

        return view('catalog_front', [
            'categories' => $categories,
        ]);
    }

    public function category(Request $request, $category_id) {

        $category = Category::query()
            ->where('id', $category_id)
            ->with('subcategories')
            ->with('subcategories.products_instock')
            ->first();

        return view('catalog_category', [
            'category' => $category,
        ]);
    }

    public function product(Request $request, $category_id, $product_id) {

        $product = Product::query()
            ->where('id', $product_id)
            ->with('units_instock')
            ->with('ingradients')
            ->with('subcategory.toppings')
            ->with('subcategory.toppings.mainunit')
            // TODO CONTROL MAINUNIT EXISTS
            ->first();

        return view('catalog_product', [
            'product' => $product,
        ]);

    }

    public function home(Request $request) {

        $orders = Order::where('customer_id', Auth::id())->get();

        return view('home', [
            'orders' => $orders,
        ]);
    }

    public function home_order(Request $request, $ordr_id) {

        $order = Order::query()->where('id', $ordr_id)->first();

        return view('show_order', [
            'order_id' => $ordr_id,
            'order' => $order,
        ]);
    }


    public function set_currency(Request $request)
    {
        $request->session()->put('currency', $request->currency);
        return back();
    }

}
