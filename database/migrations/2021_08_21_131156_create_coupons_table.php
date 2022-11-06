<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('type'); // %_discount, $_discount, free_item, free_shipping
            $table->decimal('discount', 8, 2)->default(0.00);
            $table->timestamp('valid_from')->nullable();
            $table->timestamp('valid_to')->nullable();
            $table->boolean('limit_to_users')->default(false); // true: limit to user_coupon table
            $table->unsignedInteger('redeem_limit')->nullable(); // total no. times can be redeemed
            $table->decimal('redeem_threshhold', 8, 2)->default(0.00); // min spend
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
