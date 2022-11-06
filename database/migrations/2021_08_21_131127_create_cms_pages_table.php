<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('cms_slider_id')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('label')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('permalink')->nullable()->index()->unique();
            $table->text('content')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->boolean('show_in_nav')->default(false);
            $table->boolean('show_in_footer')->default(false);
            $table->integer('sort_order')->nullable()->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cms_slider_id')->references('id')->on('cms_sliders');
            $table->foreign('parent_id')->references('id')->on('cms_pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_pages', function (Blueprint $table) {
            $table->dropForeign(['cms_slider_id']);
            $table->dropForeign(['parent_id']);
        });
        Schema::dropIfExists('cms_pages');
    }
}
