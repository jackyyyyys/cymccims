<?php

use Illuminate\Database\Seeder;
use App\RfidReader;
use App\Zone;
use Carbon\Carbon;

class RfidReadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $readers = array_map('str_getcsv', file( public_path() . "/csv/rfidReaders.csv" ));
        for ($i = 1; $i < sizeof($readers); $i++) {
            RfidReader::create(array(
                'name' => $readers[$i][0],
                'zone_id' => DB::table('zones')->select('id')->where('name',$readers[$i][1])->first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ));
        }
    }
}
