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
                'name' => 'Эвакуатор для коммерческого транспорта',
                'slug' => 'evakuator-dlya-kommercheskogo-transporta',
                'meta_title' => 'Эвакуатор для коммерческого транспорта',
                'meta_description' => 'Краткое описание для Эвакуатор для коммерческого транспорта',
                'desc1_title' => 'Заголовок для блока с текстом',
                'desc1_text' => 'Текст для блока с текстом',
            ],
        ]);
    }
}