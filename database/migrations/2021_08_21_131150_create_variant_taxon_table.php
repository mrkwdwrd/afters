<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariantTaxonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variant_taxon', function (Blueprint $table) {
            $table->unsignedBigInteger('variant_id');
            $table->unsignedBigInteger('taxon_id');
            $table->unsignedBigInteger('sort_order')->default(0);
            $table->foreign('taxon_id')->references('id')->on('taxons')->onDelete('cascade');
            $table->foreign('variant_id')->references('id')->on('variants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('variant_taxon', function (Blueprint $table) {
            $table->dropForeign(['taxon_id']);
            $table->dropForeign(['variant_id']);
        });
        Schema::dropIfExists('variant_taxon');
    }
}
