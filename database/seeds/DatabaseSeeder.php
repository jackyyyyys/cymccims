<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Model::unguard();

        DB::table('item_categories')->delete();
        $this->call('ItemCategoriesTableSeeder');

        DB::table('departments')->delete();
        $this->call('DepartmentsTableSeeder');

        DB::table('theatres')->delete();
        $this->call('TheatresTableSeeder');

        DB::table('zones')->delete();
        $this->call('ZonesTableSeeder');

        DB::table('items')->delete();
        $this->call('ItemsTableSeeder');

        DB::table('rfid_tags')->delete();
        $this->call('RfidTagsTableSeeder');

        DB::table('rfid_readers')->delete();
        $this->call('RfidReadersTableSeeder');

        DB::table('rules')->delete();
        $this->call('RulesTableSeeder');

        MOdel::reguard();
    }
}
