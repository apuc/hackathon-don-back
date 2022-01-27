<?php

namespace Database\Seeders;

use App\Models\HashTag;
use Illuminate\Database\Seeder;

class HashTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HashTag::factory()
            ->count(10)
            ->create();
    }
}
