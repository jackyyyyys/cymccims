<?php

use Illuminate\Database\Seeder;
use App\Zone;
use App\Theatre;
use Carbon\Carbon;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {
        $zones = array_map('str_getcsv', file( public_path() . "/csv/zones.csv" ));
        for ($i = 1; $i < sizeof($zones); $i++) {
            if ($zones[$i][2] == TRUE) {
                $id[$i] = DB::table('theatres')->select('id')->where('name', $zones[$i][2])->first()->id;
            } else {
                $id[$i] = NULL;
            }
            Zone::create(array(
                'name' => $zones[$i][0],
                'description' => $zones[$i][1],
                'theatre_id' => $id[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ));
        }
    }
}
