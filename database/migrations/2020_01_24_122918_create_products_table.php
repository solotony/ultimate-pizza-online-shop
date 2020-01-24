<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('subcategory_id');
            $table->string('name', 200);
            $table->string('photo', 500)->nullable();
            $table->boolean('instock')->default(true);
            $table->text('info')->nullable();

            $table->index('subcategory_id', 'subcategory_id');

            $table->foreign('subcategory_id', 'product_subcategory_fk')
                ->references('id')
                ->on('subcategories')
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
        Schema::dropIfExists('products');
    }
}
