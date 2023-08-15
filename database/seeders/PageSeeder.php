<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    public function run()
    {
        DB::table('pages')->insert([
            [
                'id' => 1,
                'name' => 'Эвакуатор для легковой машины',
                'slug' => 'evakuator-dlya-legkovoy-mashiny',
                'price' => 2000,
                'order' => 1,
                'icon' => '/img/legk.png',
                'meta_title' => 'Эвакуатор для легковой машины',
                'meta_description' => 'Краткое описание для Эвакуатор для легковой машины',
                'desc1_title' => 'Заголовок для блока с текстом',
                'desc1_text' => 'Текст для блока с текстом',
            ],
        ]);
    }
}