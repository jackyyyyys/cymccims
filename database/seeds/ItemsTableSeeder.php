<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\ItemCategory;
use App\Department;
use App\Zone;
use App\RfidTag;
use Carbon\Carbon;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {
        $items = array_map('str_getcsv', file( public_path() . "/csv/items.csv" ));
        $tags = array_map('str_getcsv', file( public_path() . "/csv/rfidTags.csv" ));
        for ($i = 1; $i < sizeof($items); $i++) {
            Item::create(array(
                'name' => $items[$i][0],
                'description' => $items[$i][1],
                'category_id' => DB::table('item_categories')->select('id')->where('name', $items[$i][2])->first()->id,
                'department_id' => DB::table('departments')->select('id')->where('name', $items[$i][3])->first()->id,
                'store_zone_id' => DB::table('zones')->select('id')->where('name',$items[$i][4])->first()->id,
                'latest_zone_id' => DB::table('zones')->select('id')->where('name',$items[$i][4])->first()->id,
                'brand' => $items[$i][5],
                'model' => $items[$i][6],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ));
            RfidTag::create(array(
                'name' => $tags[$i][0],
                'item_id' => $i
            ));
        }
    }
}
