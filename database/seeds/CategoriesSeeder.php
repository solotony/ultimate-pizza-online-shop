<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            ['id' => 1, 'name'=>'Pizza'],
            ['id' => 2, 'name'=>'Drinks'],
            ['id' => 3, 'name'=>'Pies'],
            ['id' => 4, 'name'=>'Toppings'],
        ]);

        \Illuminate\Support\Facades\DB::table('subcategories')->insert([
            ['id' => 1, 'category_id'=>1, 'name'=>'Classic pizzas'],
            ['id' => 2, 'category_id'=>1, 'name'=>'Hot pizzas'],
            ['id' => 3, 'category_id'=>1, 'name'=>'Sweet pizzas'],
            ['id' => 4, 'category_id'=>2, 'name'=>'Soft drinks'],
            ['id' => 5, 'category_id'=>2, 'name'=>'Beer'],
            ['id' => 6, 'category_id'=>2, 'name'=>'Vodka'],
            ['id' => 7, 'category_id'=>3, 'name'=>'Russian Pies'],
            ['id' => 8, 'category_id'=>3, 'name'=>'Adygea Pies'],
            ['id' => 9, 'category_id'=>3, 'name'=>'Crimea Pies'],
            ['id' => 10, 'category_id'=>4, 'name'=>'Pizza Toppings'],
            ['id' => 11, 'category_id'=>4, 'name'=>'Sweet Toppings'],
        ]);

        \Illuminate\Support\Facades\DB::table('products')->insert([
            ['id' => 1, 'subcategory_id'=>10, 'name'=>'Greens'],
            ['id' => 2, 'subcategory_id'=>10, 'name'=>'Mustard'],
            ['id' => 3, 'subcategory_id'=>10, 'name'=>'Adjika'],
            ['id' => 4, 'subcategory_id'=>10, 'name'=>'Chili'],
            ['id' => 5, 'subcategory_id'=>11, 'name'=>'Powdered sugar'],
            ['id' => 6, 'subcategory_id'=>11, 'name'=>'Honey'],
            ['id' => 7, 'subcategory_id'=>11, 'name'=>'Jam'],
        ]);

        \Illuminate\Support\Facades\DB::table('products')->insert([
            ['id' => 8,  'subcategory_id'=>1, 'name'=>'Pizza Margarita', 'info' => "Pizza Margarita-traditional Italian pizza, perhaps the most popular in the world, even the menu of any pizzeria begins, as a rule, with it. The composition of this pizza is extremely simple, its main ingredients are mozzarella cheese, ripe tomatoes and fresh Basil leaves, which give it a unique taste and aroma. \nAccording to legend, the pizza owes its name to Margarita of Savoy-the wife of the Italian king Umberto I, who loved this pizza very much.\n To prepare the classic, most delicious pizza Margarita you need very few ingredients, but they should be exactly the ones listed. That is, of course, you can replace mozzarella with another cheese, but then you will not get a pizza Margarita, but just some kind of pizza. Therefore, strictly follow the recipe and, I hope, pizza Margarita will not disappoint you."],
            ['id' => 9,  'subcategory_id'=>1, 'name'=>'Pizza Cezar', 'info'=>"Pizza Caesar is one of the most beloved and demanded dishes among connoisseurs of this delicious food. The secret of this delicacy is not just the selection of ingredients, but also in the preparation of the sauce. It is he who makes pizza unique, gives it piquancy and originality.\nGorgeous four-story Caesar pizza with chicken breast, tomatoes, two types of cheese and using two types of sauce from Crazy Brothers."],
            ['id' => 10, 'subcategory_id'=>1, 'name'=>'Pizza with mashrooms', 'info'=>"This pizza is just perfect! Judge for yourself, thin crust with crispy edges, juicy and satisfying filling with sauce, tomatoes, mushrooms, chicken and lots of melted cheese! Recipe for two large pizzas."],
            ['id' => 11, 'subcategory_id'=>2, 'name'=>'Pizza peperroni', 'info'=>"Pepperoni pizza is considered a culinary card of the North of Italy. The recipe for this dish is easy to distinguish by the presence of a special type of salami - Pepperoni. Real sausage contains capsicum. It is he who gives the ready pizza sharpness. For this piquant taste, locals jokingly call the pizza “Devilish”. This name best emphasizes its pungent taste. Tomato sauce, salami of the same name, Mozzarella - those products that contain real pepperoni pizza. The recipe at home has gained hundreds of variations. They were based on spicy salami, prosciutto ham or spicy jamon. Tomato sauce was often replaced with cream, olives were added to Mozzarella."],
            ['id' => 12, 'subcategory_id'=>2, 'name'=>'Pizza chili', 'info'=> "Pizza Chili-traditional Italian pizza, perhaps the most popular in the world, even the menu of any pizzeria begins, as a rule, with it. The composition of this pizza is extremely simple, its main ingredients are mozzarella cheese, ripe tomatoes and fresh Basil leaves, which give it a unique taste and aroma. \nAccording to legend, the pizza owes its name to Chili of Savoy-the wife of the Italian king Umberto I, who loved this pizza very much.\n To prepare the classic, most delicious pizza Chili you need very few ingredients, but they should be exactly the ones listed. That is, of course, you can replace mozzarella with another cheese, but then you will not get a pizza Chili, but just some kind of pizza. Therefore, strictly follow the recipe and, I hope, pizza Chili will not disappoint you."],
            ['id' => 13, 'subcategory_id'=>3, 'name'=>'Ananas pizza', 'info'=>"Pizza Ananas is one of the most beloved and demanded dishes among connoisseurs of this delicious food. The secret of this delicacy is not just the selection of ingredients, but also in the preparation of the sauce. It is he who makes pizza unique, gives it piquancy and originality.\nGorgeous four-story Caesar pizza with chicken breast, tomatoes, two types of cheese and using two types of sauce from Crazy Brothers."],
            ['id' => 14, 'subcategory_id'=>3, 'name'=>'Strawbwerry pizza', 'info'=>"Strawbwerry pizza pizza is considered a culinary card of the North of Italy. The recipe for this dish is easy to distinguish by the presence of a special type of salami - Pepperoni. Real sausage contains capsicum. It is he who gives the ready pizza sharpness. For this piquant taste, locals jokingly call the pizza “Devilish”. This name best emphasizes its pungent taste. Tomato sauce, salami of the same name, Mozzarella - those products that contain real pepperoni pizza. The recipe at home has gained hundreds of variations. They were based on spicy salami, prosciutto ham or spicy jamon. Tomato sauce was often replaced with cream, olives were added to Strawbwerry pizza."],
            ]);

        \Illuminate\Support\Facades\DB::table('products')->insert([
            ['id' => 15, 'subcategory_id'=>4, 'name'=>'Pepsi'],
            ['id' => 16, 'subcategory_id'=>4, 'name'=>'Fanta'],
            ['id' => 17, 'subcategory_id'=>4, 'name'=>'Baikal'],
            ['id' => 18, 'subcategory_id'=>5, 'name'=>'Hugarden beer'],
            ['id' => 19, 'subcategory_id'=>5, 'name'=>'Heiniken beer'],
            ['id' => 20, 'subcategory_id'=>6, 'name'=>'Russkaya vodka'],
            ['id' => 21, 'subcategory_id'=>6, 'name'=>'Anisovaya vodka'],

            ['id' => 22, 'subcategory_id'=>7, 'name'=>'Pie with meat'],
            ['id' => 23, 'subcategory_id'=>7, 'name'=>'Kurnik'],
            ['id' => 24, 'subcategory_id'=>7, 'name'=>'Pie with potato'],
            ['id' => 25, 'subcategory_id'=>8, 'name'=>'Adygea pie with beef'],
            ['id' => 26, 'subcategory_id'=>8, 'name'=>'Adygea pie with pork'],
            ['id' => 27, 'subcategory_id'=>9, 'name'=>'Crimea pie with onion'],
        ]);


        \Illuminate\Support\Facades\DB::table('units')->insert([
            ['id' => 1, 'product_id' => 1, 'weight'=>20, 'price'=>30],
            ['id' => 2, 'product_id' => 2, 'weight'=>40, 'price'=>20],
            ['id' => 3, 'product_id' => 3, 'weight'=>40, 'price'=>50],
            ['id' => 4, 'product_id' => 4, 'weight'=>40, 'price'=>40],
            ['id' => 5, 'product_id' => 5, 'weight'=>10, 'price'=>10],
            ['id' => 6, 'product_id' => 6, 'weight'=>20, 'price'=>40],
            ['id' => 7, 'product_id' => 7, 'weight'=>20, 'price'=>40],
        ]);
        \Illuminate\Support\Facades\DB::table('units')->insert([
            ['id' => 8, 'product_id' => 8,  'weight'=>700, 'size'=>40, 'size_name'=>'диаметр, см', 'price'=>450],
            ['id' => 9, 'product_id' => 8,  'weight'=>500, 'size'=>30, 'size_name'=>'диаметр, см', 'price'=>380],
            ['id' =>10, 'product_id' => 8,  'weight'=>300, 'size'=>25, 'size_name'=>'диаметр, см', 'price'=>330],
            ['id' =>11, 'product_id' => 9,  'weight'=>700, 'size'=>40, 'size_name'=>'диаметр, см', 'price'=>450],
            ['id' =>12, 'product_id' => 9,  'weight'=>500, 'size'=>30, 'size_name'=>'диаметр, см', 'price'=>380],
            ['id' =>13, 'product_id' => 9,  'weight'=>300, 'size'=>25, 'size_name'=>'диаметр, см', 'price'=>330],
            ['id' =>14, 'product_id' => 10, 'weight'=>700, 'size'=>40, 'size_name'=>'диаметр, см', 'price'=>450],
            ['id' =>15, 'product_id' => 10, 'weight'=>500, 'size'=>30, 'size_name'=>'диаметр, см', 'price'=>380],
            ['id' =>16, 'product_id' => 10, 'weight'=>300, 'size'=>25, 'size_name'=>'диаметр, см', 'price'=>330],
            ['id' =>17, 'product_id' => 11, 'weight'=>700, 'size'=>40, 'size_name'=>'диаметр, см', 'price'=>450],
            ['id' =>18, 'product_id' => 11, 'weight'=>500, 'size'=>30, 'size_name'=>'диаметр, см', 'price'=>380],
            ['id' =>19, 'product_id' => 11, 'weight'=>300, 'size'=>25, 'size_name'=>'диаметр, см', 'price'=>330],
            ['id' =>20, 'product_id' => 12, 'weight'=>700, 'size'=>40, 'size_name'=>'диаметр, см', 'price'=>450],
            ['id' =>21, 'product_id' => 12, 'weight'=>500, 'size'=>30, 'size_name'=>'диаметр, см', 'price'=>380],
            ['id' =>22, 'product_id' => 12, 'weight'=>300, 'size'=>25, 'size_name'=>'диаметр, см', 'price'=>330],
            ['id' =>23, 'product_id' => 13, 'weight'=>700, 'size'=>40, 'size_name'=>'диаметр, см', 'price'=>450],
            ['id' =>24, 'product_id' => 13, 'weight'=>500, 'size'=>30, 'size_name'=>'диаметр, см', 'price'=>380],
            ['id' =>25, 'product_id' => 13, 'weight'=>300, 'size'=>25, 'size_name'=>'диаметр, см', 'price'=>330],
            ['id' =>26, 'product_id' => 14, 'weight'=>700, 'size'=>40, 'size_name'=>'диаметр, см', 'price'=>450],
            ['id' =>27, 'product_id' => 14, 'weight'=>500, 'size'=>30, 'size_name'=>'диаметр, см', 'price'=>380],
            ['id' =>28, 'product_id' => 14, 'weight'=>300, 'size'=>25, 'size_name'=>'диаметр, см', 'price'=>330],
        ]);
        \Illuminate\Support\Facades\DB::table('units')->insert([
            ['id' =>29, 'product_id' => 15, 'volume'=>500, 'price'=>100],
            ['id' =>30, 'product_id' => 15, 'volume'=>330, 'price'=>80],
            ['id' =>31, 'product_id' => 16, 'volume'=>500, 'price'=>100],
            ['id' =>32, 'product_id' => 16, 'volume'=>330, 'price'=>80],
            ['id' =>33, 'product_id' => 17, 'volume'=>500, 'price'=>100],
            ['id' =>34, 'product_id' => 17, 'volume'=>330, 'price'=>80],
            ['id' =>35, 'product_id' => 18, 'volume'=>500, 'price'=>150],
            ['id' =>36, 'product_id' => 18, 'volume'=>330, 'price'=>120],
            ['id' =>37, 'product_id' => 19, 'volume'=>500, 'price'=>150],
            ['id' =>38, 'product_id' => 19, 'volume'=>330, 'price'=>120],
            ['id' =>39, 'product_id' => 20, 'volume'=>50 , 'price'=>300],
            ['id' =>40, 'product_id' => 20, 'volume'=>100, 'price'=>500],
            ['id' =>41, 'product_id' => 21, 'volume'=>50 , 'price'=>500],
            ['id' =>42, 'product_id' => 21, 'volume'=>100, 'price'=>800],
            ['id' =>43, 'product_id' => 22, 'weight'=>900, 'price'=>600],
            ['id' =>44, 'product_id' => 22, 'weight'=>700, 'price'=>500],
            ['id' =>45, 'product_id' => 22, 'weight'=>500, 'price'=>400],
            ['id' =>46, 'product_id' => 23, 'weight'=>900, 'price'=>600],
            ['id' =>47, 'product_id' => 23, 'weight'=>700, 'price'=>500],
            ['id' =>48, 'product_id' => 23, 'weight'=>500, 'price'=>400],
            ['id' =>49, 'product_id' => 24, 'weight'=>900, 'price'=>600],
            ['id' =>50, 'product_id' => 24, 'weight'=>700, 'price'=>500],
            ['id' =>51, 'product_id' => 24, 'weight'=>500, 'price'=>400],
            ['id' =>52, 'product_id' => 25, 'weight'=>900, 'price'=>600],
            ['id' =>53, 'product_id' => 25, 'weight'=>700, 'price'=>500],
            ['id' =>54, 'product_id' => 25, 'weight'=>500, 'price'=>400],
            ['id' =>55, 'product_id' => 26, 'weight'=>900, 'price'=>600],
            ['id' =>56, 'product_id' => 26, 'weight'=>700, 'price'=>500],
            ['id' =>57, 'product_id' => 26, 'weight'=>500, 'price'=>400],
            ['id' =>58, 'product_id' => 27, 'weight'=>900, 'price'=>600],
            ['id' =>59, 'product_id' => 27, 'weight'=>700, 'price'=>500],
            ['id' =>60, 'product_id' => 27, 'weight'=>500, 'price'=>400],
        ]);

        \Illuminate\Support\Facades\DB::table('ingradients')->insert([
            ['id'=>1, 'name'=>'Tomato'],
            ['id'=>2, 'name'=>'Ham'],
            ['id'=>3, 'name'=>'Cheeze'],
            ['id'=>4, 'name'=>'Sausage'],
            ['id'=>5, 'name'=>'Salami'],
            ['id'=>6, 'name'=>'Meat'],
            ['id'=>7, 'name'=>'Fish'],
            ['id'=>8, 'name'=>'Mozarella'],
            ['id'=>9, 'name'=>'Mashrooms'],
            ['id'=>10, 'name'=>'Olives'],
            ['id'=>11, 'name'=>'Eggs'],
        ]);

        \Illuminate\Support\Facades\DB::table('product_ingradient')->insert([
            ['product_id' => 8,  'ingradient_id'=>  1, ],
            ['product_id' => 8,  'ingradient_id'=>  2, ],
            ['product_id' => 8,  'ingradient_id'=>  3, ],
            ['product_id' => 8,  'ingradient_id'=>  4, ],
            ['product_id' => 9,  'ingradient_id'=>  5, ],
            ['product_id' => 9,  'ingradient_id'=>  6, ],
            ['product_id' => 9,  'ingradient_id'=>  7, ],
            ['product_id' => 9,  'ingradient_id'=>  8, ],
            ['product_id' => 10, 'ingradient_id'=>  9, ],
            ['product_id' => 10, 'ingradient_id'=> 10, ],
            ['product_id' => 10, 'ingradient_id'=> 11, ],
            ['product_id' => 10, 'ingradient_id'=>  1, ],
            ['product_id' => 11, 'ingradient_id'=>  2, ],
            ['product_id' => 11, 'ingradient_id'=>  3, ],
            ['product_id' => 11, 'ingradient_id'=>  4, ],
            ['product_id' => 11, 'ingradient_id'=>  5, ],
            ['product_id' => 12, 'ingradient_id'=>  6, ],
            ['product_id' => 12, 'ingradient_id'=>  7, ],
            ['product_id' => 12, 'ingradient_id'=>  8, ],
            ['product_id' => 12, 'ingradient_id'=>  9, ],
            ['product_id' => 13, 'ingradient_id'=> 10, ],
            ['product_id' => 13, 'ingradient_id'=> 11, ],
            ['product_id' => 13, 'ingradient_id'=> 3, ],
            ['product_id' => 13, 'ingradient_id'=> 4, ],
            ['product_id' => 14, 'ingradient_id'=> 5, ],
            ['product_id' => 14, 'ingradient_id'=> 6, ],
            ['product_id' => 14, 'ingradient_id'=> 7, ],
            ['product_id' => 14, 'ingradient_id'=> 8, ],
        ]);


        \Illuminate\Support\Facades\DB::table('subcategory_topping')->insert([
            ['subcategory_id' => 1, 'topping_id'=> 1,  ],
            ['subcategory_id' => 1, 'topping_id'=> 2,  ],
            ['subcategory_id' => 1, 'topping_id'=> 3,  ],
            ['subcategory_id' => 1, 'topping_id'=> 4,  ],
            ['subcategory_id' => 1, 'topping_id'=> 5,  ],
            ['subcategory_id' => 2, 'topping_id'=> 6,  ],
            ['subcategory_id' => 2, 'topping_id'=> 7,  ],
            ['subcategory_id' => 2, 'topping_id'=> 1,  ],
            ['subcategory_id' => 2, 'topping_id'=> 2,  ],
            ['subcategory_id' => 2, 'topping_id'=> 3,  ],
            ['subcategory_id' => 3, 'topping_id'=> 4,  ],
            ['subcategory_id' => 3, 'topping_id'=> 5,  ],
            ['subcategory_id' => 3, 'topping_id'=> 6,  ],
            ['subcategory_id' => 3, 'topping_id'=> 7,  ],
            ['subcategory_id' => 3, 'topping_id'=> 1,  ],
            ['subcategory_id' => 7, 'topping_id'=> 2,  ],
            ['subcategory_id' => 7, 'topping_id'=> 3,  ],
            ['subcategory_id' => 7, 'topping_id'=> 4,  ],
            ['subcategory_id' => 7, 'topping_id'=> 5,  ],
            ['subcategory_id' => 7, 'topping_id'=> 6,  ],
            ['subcategory_id' => 8, 'topping_id'=> 7,  ],
            ['subcategory_id' => 8, 'topping_id'=> 1,  ],
            ['subcategory_id' => 8, 'topping_id'=> 2, ],
            ['subcategory_id' => 8, 'topping_id'=> 3, ],
            ['subcategory_id' => 9, 'topping_id'=> 4, ],
            ['subcategory_id' => 9, 'topping_id'=> 5, ],
            ['subcategory_id' => 9, 'topping_id'=> 6, ],
            ['subcategory_id' => 9, 'topping_id'=> 7, ],
        ]);

        \Illuminate\Support\Facades\DB::table('currencies')->insert([
            ['id'=>1, 'name' => 'RUR', 'sign'=> '₽',  'sign_before'=>false, 'rate'=>1],
            ['id'=>2, 'name' => 'USD', 'sign'=> '$',  'sign_before'=>true, 'rate'=>62.07],
            ['id'=>3, 'name' => 'EUR', 'sign'=> '€',  'sign_before'=>true, 'rate'=>68.44],
        ]);

    }
}
