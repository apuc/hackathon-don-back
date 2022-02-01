<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'title' => 'admin',
            'mnemonic_name' => 'Administrator',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'title' => 'driver',
            'mnemonic_name' => 'Driver',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'title' => 'user',
            'mnemonic_name' => 'User',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'title' => 'moderator',
            'mnemonic_name' => 'Moderator',
            'created_at' => now(),
        ]);

    }
}
