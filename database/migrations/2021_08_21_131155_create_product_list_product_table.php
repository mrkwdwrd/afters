<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductListProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_list_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_list_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('product_list_id')->references('id')->on('product_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_list_product', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['product_list_id']);
        });
        Schema::dropIfExists('product_list_product');
    }
}
