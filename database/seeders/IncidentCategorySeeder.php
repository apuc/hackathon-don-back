<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IncidentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        DB::table('incident_category')->insert([
            'title' => 'Состояние дорог и прилегающих територий',
            'mnemonic_name' => 'дорога',
            'icon' => Str::random(15),
            'rating' => random_int(0, 1000),
            'created_at' => now(),
        ]);
        DB::table('incident_category')->insert([
            'title' => 'Состояние благоустройства города',
            'mnemonic_name' => 'благоустройство',
            'icon' => Str::random(15),
            'rating' => random_int(0, 1000),
            'created_at' => now(),
        ]);
        DB::table('incident_category')->insert([
            'title' => 'Прорывы водо- тепло- коммуникаций, обрывы электрокоммуникаций',
            'mnemonic_name' => 'прорывы',
            'icon' => Str::random(15),
            'rating' => random_int(0, 1000),
            'created_at' => now(),
        ]);
        DB::table('incident_category')->insert([
            'title' => 'Постройка в аварийном состоянии',
            'mnemonic_name' => 'ветхое строение',
            'icon' => Str::random(15),
            'rating' => random_int(0, 1000),
            'created_at' => now(),
        ]);
        DB::table('incident_category')->insert([
            'title' => 'Уборка територии и вывоз отходов',
            'mnemonic_name' => 'уборка',
            'icon' => Str::random(15),
            'rating' => random_int(0, 1000),
            'created_at' => now(),
        ]);
        DB::table('incident_category')->insert([
            'title' => 'Скопление животных',
            'mnemonic_name' => 'животные',
            'icon' => Str::random(15),
            'rating' => random_int(0, 1000),
            'created_at' => now(),
        ]);
        DB::table('incident_category')->insert([
            'title' => 'Некачественные товары',
            'mnemonic_name' => 'товары',
            'icon' => Str::random(15),
            'rating' => random_int(0, 1000),
            'created_at' => now(),
        ]);



        DB::table('incident_category')->insert([
            'title' => 'Последствия стихийных бедствий',
            'mnemonic_name' => 'стихия',
            'icon' => Str::random(15),
            'rating' => random_int(0, 1000),
            'created_at' => now(),
        ]);
        DB::table('incident_category')->insert([
            'title' => 'Проявления вандализма',
            'mnemonic_name' => 'вандализм',
            'icon' => Str::random(15),
            'rating' => random_int(0, 1000),
            'created_at' => now(),
        ]);
        DB::table('incident_category')->insert([
            'title' => 'Нарушение КЗОТ',
            'mnemonic_name' => 'кзот',
            'icon' => Str::random(15),
            'rating' => random_int(0, 1000),
            'created_at' => now(),
        ]);
        DB::table('incident_category')->insert([
            'title' => 'Скопление криминальных элементов',
            'mnemonic_name' => 'хулиганы',
            'icon' => Str::random(15),
            'rating' => random_int(0, 1000),
            'created_at' => now(),
        ]);
        DB::table('incident_category')->insert([
            'title' => 'Нарушение ПДД',
            'mnemonic_name' => 'пдд',
            'icon' => Str::random(15),
            'rating' => random_int(0, 1000),
            'created_at' => now(),
        ]);
    }
}
