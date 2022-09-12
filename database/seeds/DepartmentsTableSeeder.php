<?php

use Illuminate\Database\Seeder;
use App\Department;
use Carbon\Carbon;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {
        $departments = array_map('str_getcsv', file( public_path() . "/csv/departments.csv" ));
        for ($i = 1; $i < sizeof($departments); $i++) {
            Department::create(array(
                'name' => $departments[$i][0],
                'description' => $departments[$i][1],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ));
        }
    }
}
