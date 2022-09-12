<?php

use Illuminate\Database\Seeder;
use App\Theatre;
use Carbon\Carbon;

class TheatresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
    */

    public function run() {
        $theatres = array_map('str_getcsv', file( public_path() . "/csv/theatres.csv" ));
        for ($i = 1; $i < sizeof($theatres); $i++) {
            Theatre::create(array(
                'name' => $theatres[$i][0],
                'description' => $theatres[$i][1],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ));
        }
    }
}
