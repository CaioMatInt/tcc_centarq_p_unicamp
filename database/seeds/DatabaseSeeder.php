<?php

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
        $this->call([ComplaintsTableSeeder::class]);
        $this->call([ConductionPointsTableSeeder::class]);
        $this->call([GendersTableSeeder::class]);
        $this->call([UserTypesTableSeeder::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([HealthUnitsTableSeeder::class]);
    }
}
