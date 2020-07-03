<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class HealthUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \Illuminate\Support\Facades\DB::table('health_units')->insert([
            [
                'name' => 'Unicamp',
                'created_at' => \Carbon\Carbon::now()
            ],


        ]);

    }
}
