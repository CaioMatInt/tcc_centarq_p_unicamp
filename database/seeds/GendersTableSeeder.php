<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \Illuminate\Support\Facades\DB::table('genders')->insert([
            [
                'name' => 'Homem',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Mulher',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Homem trans',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Mulher Trans',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Outro/Indefinido',
                'created_at' => \Carbon\Carbon::now()
            ]

        ]);

    }
}
