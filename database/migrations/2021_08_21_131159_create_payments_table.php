<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 8, 2)->default(0.00);
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('state')->nullable();
            $table->string('fingerprint')->nullable();
            $table->string('transaction_reference')->nullable();
            $table->string('token')->nullable();
            $table->string('payer_id')->nullable();
            $table->text('response_details')->nullable();
            $table->string('card_type')->nullable();
            $table->string('card_name')->nullable();
            $table->string('card_expiry')->nullable();
            $table->string('card_last_digits')->nullable();
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });
        Schema::dropIfExists('payments');
    }
}
