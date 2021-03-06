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

            [
                'id' => 1,
                'name' => 'Funcionário',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'Aluno',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 3,
                'name' => 'Docente',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 4,
                'name' => 'Externo',
                'created_at' => \Carbon\Carbon::now()
            ]

        ]);

    }
}
