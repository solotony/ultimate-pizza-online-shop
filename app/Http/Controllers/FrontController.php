<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function front() {
        $categories = Category::query()->get();

        return view('catalog_front', [
            'categories' => $categories
        ]);
    }

    public function category($category_id) {

        $category = Category::query()
            ->where('id', $category_id)
            ->with('subcategories')
            ->with('subcategories.products_instock')
            ->first();


        return view('catalog_category', [
            'category' => $category
        ]);
    }

    public function product($category_id, $product_id) {

        $product = Product::query()
            ->where('id', $product_id)
            ->with('units_instock')
            ->with('ingradients')
            ->with('subcategory.toppings')
            ->first();

        return view('catalog_product', [
            'product' => $product
        ]);

    }
}
