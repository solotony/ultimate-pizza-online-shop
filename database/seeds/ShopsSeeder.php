<?php

use Illuminate\Database\Seeder;

class ShopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('shops')->insert([
            ['id'=> 1, 'name'=>'Pizza shop # 1','address'=>'SPB Nevskiy 49','info'=>'The true Italian taste now delivered on your doorstep. View Our Menu. Download Our Mobile App. Make An Enquiry. Steps: Browse, Order, Track.'],
            ['id'=> 2, 'name'=>'Super Pizza','address'=>'SPB gorohovaya 57a','info'=>'Find your food freedom today. Choose your food and track it to your door. Order your favourite Pizza with the toppings you want on Deliveroo today. Cheesy Mozzarela. Pepperoni.'],
            ['id'=> 3, 'name'=>'New Pizza Shop','address'=>'SPB Stremyannaya 9 ','info'=>'Order your favourite pizza for delivery in SPB From the well-known cheese and tomato of the Margherita to customised creations of your own choosing such as pepperoni and pineapple, there are pizza toppings you can enjoy at any time.'],
        ]);

    }
}
