<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_id');
            $table->integer('status_old');
            $table->integer('status_new');
            $table->string('name', 200);
            $table->string('info', 500);

            $table->index('user_id', 'user_id');
            $table->index('order_id', 'order_id');

            $table->foreign('user_id', 'operation_user_fk')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

            $table->foreign('order_id', 'operation_order_fk')
                ->references('id')
                ->on('orders')
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
        Schema::dropIfExists('operations');
    }
}
