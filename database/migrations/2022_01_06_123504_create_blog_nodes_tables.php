<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogNodesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("blog_nodes", function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("blog_id");
            $table->integer("order")->default(1);
            $table->timestamps();

            $table->foreign("blog_id")->references("id")->on("cms_blog_posts")->onDelete("cascade");
        });

        Schema::create("blog_node_contents", function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("blog_node_id");
            $table->string("node_type");
            $table->integer("node_id");
            $table->timestamps();

            $table->foreign("blog_node_id")->references("id")->on("blog_nodes")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("blog_node_contents", function(Blueprint $table) {
            $table->dropForeign(["blog_node_id"]);
        });

        Schema::dropIfExists("blog_node_contents");

        Schema::table("blog_nodes", function(Blueprint $table) {
            $table->dropForeign(["blog_id"]);
        });

        Schema::dropIfExists("blog_nodes");
    }
}
