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
            'title' => 'Водитель',
            'mnemonic_name' => 'водитель',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'title' => 'Пользователь',
            'mnemonic_name' => 'дорога',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'title' => 'Модератор',
            'mnemonic_name' => 'модератор',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'title' => 'Администратор',
            'mnemonic_name' => 'админ',
            'created_at' => now(),
        ]);
    }
}
