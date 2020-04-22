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
            'email_verified_at' => now(),
            'password' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
