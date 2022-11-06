<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTaxonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_taxon', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('taxon_id');
            $table->foreign('post_id')->references('id')->on('cms_blog_posts')->onDelete('cascade');
            $table->foreign('taxon_id')->references('id')->on('taxons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_taxon', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropForeign(['taxon_id']);
        });
        Schema::dropIfExists('blog_taxon');
    }
}
