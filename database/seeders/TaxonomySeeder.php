<?php

namespace Database\Seeders;

use App\Models\Taxonomy;
use Illuminate\Database\Seeder;

class TaxonomySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxonomies = ["Blog Categories"];
        foreach ($taxonomies as $taxonomy) {
            $existing_taxonomy = Taxonomy::where("name", $taxonomy)->first();
            if ($existing_taxonomy)
                continue;

            Taxonomy::create(["name" => $taxonomy]);
        }
    }
}
