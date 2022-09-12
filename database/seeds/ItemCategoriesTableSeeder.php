<?php

use Illuminate\Database\Seeder;
use App\ItemCategory;
use Carbon\Carbon;

class ItemCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {
        $categories = array_map('str_getcsv', file( public_path() . "/csv/itemCategories.csv" ));
        for ($i = 1; $i < sizeof($categories); $i++) {
            ItemCategory::create(array(
                'name' => $categories[$i][0],
                'description' => $categories[$i][1],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ));
        }
    }

}
