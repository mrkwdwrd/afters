<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsNodeContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_node_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cms_node_id');
            $table->unsignedBigInteger('contentable_id')->nullable()->index();
            $table->string('contentable_type')->index();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cms_node_id')->references('id')->on('cms_nodes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_node_contents', function (Blueprint $table) {
            $table->dropForeign(['cms_node_id']);
        });
        Schema::dropIfExists('cms_node_contents');
    }
}
