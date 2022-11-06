<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_item_id');
            $table->unsignedBigInteger('shipping_method_id');
            $table->string('country_iso')->nullable();
            $table->decimal('base_charge', 8, 2)->nullable();
            $table->decimal('item_charge', 8, 2)->nullable();
            $table->timestamps();
            $table->foreign('shipping_item_id')->references('id')->on('shipping_items')->onDelete('cascade');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipping_charges', function (Blueprint $table) {
            $table->dropForeign(['shipping_item_id']);
            $table->dropForeign(['shipping_method_id']);
        });
        Schema::dropIfExists('shipping_charges');
    }
}
