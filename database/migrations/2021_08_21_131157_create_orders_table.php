<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('email')->nullable();
            $table->string('state')->default('cart');
            $table->timestamp('completed_at')->nullable();
            $table->string('token');
            $table->unsignedBigInteger('billing_address_id')->nullable();
            $table->unsignedBigInteger('shipping_address_id')->nullable();
            $table->decimal('item_total', 8, 2)->default(0.00);
            $table->decimal('coupon_discount', 8, 2)->nullable();
            $table->decimal('subtotal', 8, 2)->default(0.00);
            $table->decimal('shipping_total', 8, 2)->nullable();
            $table->decimal('total', 8, 2)->default(0.00);
            $table->decimal('tax', 8, 2)->nullable();
            $table->unsignedBigInteger('shipping_method_id')->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_reference')->nullable();
            $table->timestamps();
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('set NULL');
            $table->foreign('billing_address_id')->references('id')->on('addresses')->onDelete('set NULL');
            $table->foreign('shipping_address_id')->references('id')->on('addresses')->onDelete('set NULL');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['coupon_id']);
            $table->dropForeign(['billing_address_id']);
            $table->dropForeign(['shipping_address_id']);
            $table->dropForeign(['shipping_method_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('orders');
    }
}
