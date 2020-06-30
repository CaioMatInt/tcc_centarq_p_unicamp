<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('user_types')->insert([
            'id' => 1,
            'name' => 'Administrador',
        ]);
    }
}
