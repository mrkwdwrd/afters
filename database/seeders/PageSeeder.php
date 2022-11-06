<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = ["Home", "Blog", "Contact"];

        foreach ($pages as $page) {
            $cmsPage = CmsPage::where("label", $page)->first();
            if ($cmsPage)
                continue;

            CmsPage::create([
                "parent_id" => null,
                "title" => $page,
                "label" => $page,
                "sort_order" => CmsPage::where('parent_id', null)->max('sort_order') + 1
            ]);
        }
    }
}
