<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert(array(
            array(
                'user_role' => " Admin",
            ),
            array(
                'user_role' => "Data Entry User",
            )
        ));
    }
}
