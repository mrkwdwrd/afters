<?php

namespace Database\Seeders;

use App\Models\Taxon;
use App\Models\Taxonomy;
use Illuminate\Database\Seeder;

class TaxonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxons = [];

        foreach ($taxons as $taxonomy => $taxon_list) {
            $taxonomy = Taxonomy::where("name", $taxonomy)->first();
            foreach ($taxon_list as $key => $taxon)
                $this->addTaxon($taxon, $taxonomy->id, $key);
        }
    }

    /**
     * Recursive function for adding taxons
     *
     * @param string|array $taxon
     * @param int $taxonomy_id
     * @param string $key
     * @param int|null $parent_id
     * @return void
     */
    private function addTaxon($taxon, $taxonomy_id, $key, $parent_id = null)
    {
        if (!is_array($taxon)) {
            if (Taxon::where("taxonomy_id", $taxonomy_id)->where("name", $taxon)->where("parent_id", $parent_id)->count() < 1)
                Taxon::create(["taxonomy_id" => $taxonomy_id, "parent_id" => $parent_id, "name" => $taxon]);
            return true;
        }

        $parent = Taxon::where("taxonomy_id", $taxonomy_id)->where("name", $key)->where("parent_id", $parent_id)->first();
        if (!$parent)
            $parent = Taxon::create(["taxonomy_id" => $taxonomy_id, "parent_id" => $parent_id, "name" => $key]);

        foreach ($taxon as $k => $tax)
            $this->addTaxon($tax, $taxonomy_id, $k, $parent->id);
    }
}
