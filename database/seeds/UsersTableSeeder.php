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
            'email' => 'admin@admin.com',
            'name' => 'Administrador Geral',
            'image' => '/images/default_user_image.jpg',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123456'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
