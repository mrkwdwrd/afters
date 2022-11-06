<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsAccordionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_accordion_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accordion_id')->nullable();
            $table->string('title');
            $table->text('content')->nullable();
            $table->integer('sort_order')->nullable()->default(0);
            $table->string('anchor')->nullable();
            $table->timestamps();
            $table->foreign('accordion_id')->references('id')->on('cms_accordions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_accordion_items', function (Blueprint $table) {
            $table->dropForeign(['accordion_id']);
        });
        Schema::dropIfExists('cms_accordion_items');
    }
}
