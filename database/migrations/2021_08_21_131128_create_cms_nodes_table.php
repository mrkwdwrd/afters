<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_nodes', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->unsignedBigInteger('cms_page_id')->nullable();
            $table->unsignedBigInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cms_page_id')->references('id')->on('cms_pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_nodes', function (Blueprint $table) {
            $table->dropForeign(['cms_page_id']);
        });
        Schema::dropIfExists('cms_nodes');
    }
}
