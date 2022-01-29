<?php

namespace Database\Seeders;

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
        $this->call([
            PetitionTableSeeder::class,
            IncidentCategorySeeder::class,
            HashTagSeeder::class,
            RolesSeeder::class,
        ]);
    }
}
