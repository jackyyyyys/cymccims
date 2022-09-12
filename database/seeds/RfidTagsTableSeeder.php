<?php

use Illuminate\Database\Seeder;
use App\RfidTag;
use App\Item;
use Carbon\Carbon;

class RfidTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = array_map('str_getcsv', file( public_path() . "/csv/rfidtags.csv" ));
        for ($i = 1; $i < sizeof($tags); $i++) {
            RfidTag::create(array(
                'name' => $tags[$i][0],
                'item_id' => DB::table('items')->select('id')->where('name',$tags[$i][1])->first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ));
        }
    }
}
