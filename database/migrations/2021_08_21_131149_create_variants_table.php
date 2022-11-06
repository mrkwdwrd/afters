<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('sku')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->text('introduction')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_sold_out')->default(false);
            $table->boolean('is_limited')->default(false);
            $table->unsignedBigInteger('stock_on_hand')->nullable();
            $table->unsignedBigInteger('shipping_item_id')->nullable();
            $table->unsignedBigInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('shipping_item_id')->references('id')->on('shipping_items')->onDelete('set NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('variants', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['shipping_item_id']);
        });
        Schema::dropIfExists('variants');
    }
}
