<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('weight')->nullable();
            $table->unsignedInteger('volume')->nullable();
            $table->unsignedInteger('size')->nullable();
            $table->string('size_name', 50)->nullable();
            $table->unsignedInteger('price')->default(0);
            $table->boolean('instock')->default(true);

            $table->index('product_id', 'product_id');

            $table->foreign('product_id', 'unit_product_fk')
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
        Schema::dropIfExists('units');
    }
}
