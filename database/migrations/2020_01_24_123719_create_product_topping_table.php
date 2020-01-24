<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductToppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategory_topping', function (Blueprint $table) {
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('topping_id');

            $table->primary(['subcategory_id', 'topping_id']);

            $table->index('subcategory_id', 'subcategory_id');
            $table->index('topping_id', 'topping_id');

            $table->foreign('subcategory_id', 'subcategory_topping_subcategory_fk')
                ->references('id')
                ->on('subcategories')
                ->onDelete('cascade');

            $table->foreign('topping_id', 'subcategory_topping_topping_fk')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategory_topping');
    }
}
