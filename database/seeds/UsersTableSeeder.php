<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'rg' => '368240125',
            'email' => 'admin@admin.com',
            'name' => 'Administrador Geral',
            'user_type_id' => 1,
            'gender_id' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('admin123456'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
