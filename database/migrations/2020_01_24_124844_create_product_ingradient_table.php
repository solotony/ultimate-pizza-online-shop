<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductIngradientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_ingradient', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('ingradient_id');

            $table->primary(['product_id', 'ingradient_id']);

            $table->index('product_id', 'product_id');
            $table->index('ingradient_id', 'ingradient_id');

            $table->foreign('product_id', 'product_ingradient_product_fk')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('ingradient_id', 'product_ingradient_ingradient_fk')
                ->references('id')
                ->on('ingradients')
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
        Schema::dropIfExists('product_ingradient');
    }
}
