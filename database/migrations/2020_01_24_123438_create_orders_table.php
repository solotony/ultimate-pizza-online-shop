<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('shop_id')->nullable();
            $table->unsignedBigInteger('courier_id')->nullable();
            $table->integer('status')->default(0);
            $table->boolean('payed')->default(false);
            $table->integer('method')->default(0);
            $table->unsignedInteger('amount')->default(0);
            $table->string('address', 500)->nullable();
            $table->string('delivery_comment', 500)->nullable();
            $table->dateTime('time_of_delivery')->nullable();

            $table->index('customer_id', 'customer_id');

            $table->foreign('customer_id', 'orders_customer_fk')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

            $table->index('courier_id', 'courier_id');

            $table->foreign('courier_id', 'orders_courier_fk')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

            $table->index('shop_id', 'shop_id');

            $table->foreign('shop_id', 'orders_shop_fk')
                ->references('id')
                ->on('shops')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
