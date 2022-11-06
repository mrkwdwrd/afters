<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsTileGroupTileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_tile_group_tile', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tile_group_id');
            $table->unsignedBigInteger('tile_id');
            $table->integer('row_no')->default(1);
            $table->integer('column_no')->default(1);
            $table->integer('order')->default(1);
            $table->foreign('tile_group_id')->references('id')->on('cms_tile_groups')->onDelete('cascade');
            $table->foreign('tile_id')->references('id')->on('tiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_tile_group_tile', function (Blueprint $table) {
            $table->dropForeign(['tile_group_id']);
            $table->dropForeign(['tile_id']);
        });
        Schema::dropIfExists('cms_tile_group_tile');
    }
}
