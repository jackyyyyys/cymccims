<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\Zone;
use App\Rule;
use Carbon\Carbon;

class RulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rules = array_map('str_getcsv', file( public_path() . "/csv/rules.csv" ));
        for ($i = 1; $i < sizeof($rules); $i++) {
            Rule::create(array(
                'item_id' => DB::table('items')->select('id')->where('name',$rules[$i][0])->first()->id,
                'zone_id' => DB::table('zones')->select('id')->where('name',$rules[$i][1])->first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ));
        }
    }
}
