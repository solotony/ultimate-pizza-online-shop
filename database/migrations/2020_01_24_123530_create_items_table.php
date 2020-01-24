<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('related_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->integer('qty')->default(0);
            $table->integer('price')->default(0);
            $table->integer('amount')->default(0);

            $table->index('order_id', 'order_id');

            $table->foreign('order_id', 'item_order_fk')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');

            $table->index('related_id', 'related_id');

            $table->foreign('related_id', 'item_item_fk')
                ->references('id')
                ->on('items')
                ->onDelete('set null');

            $table->index('product_id', 'product_id');

            $table->foreign('product_id', 'item_product_fk')
                ->references('id')
                ->on('products')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
