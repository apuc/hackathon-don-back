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
            'confirm_email_code' => Str::random(4),
            'confirm_sms_code' => Str::random(4),
            'phone' => mt_rand(1000000000, 9999999999),
            'remember_token' => Str::random(10),
        ]);
        DB::table('user_roles')->insert([
            'user_id' => '1',
            'role_id' => '1',
        ]);
    }
}
