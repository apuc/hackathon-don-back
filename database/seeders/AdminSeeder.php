<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'password' => Hash::make('password',),
            'email' => 'admin@mail.com',
            'created_at' => now(),
        ]);
        DB::table('user_roles')->insert([
            'user_id' => '1',
            'role_id' => '1',
        ]);
    }
}
