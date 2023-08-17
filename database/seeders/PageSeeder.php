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
            [
                'id' => 2,
                'name' => 'Эвакуатор для кроссовера',
                'slug' => 'evakuator-dlya-krossovera',
                'price' => 2500,
                'order' => 2,
                'icon' => '/img/kros.png',
                'meta_title' => 'Эвакуатор для кроссовера',
                'meta_description' => 'Краткое описание для Эвакуатор для кроссовера',
                'desc1_title' => 'Заголовок для блока с текстом',
                'desc1_text' => 'Текст для блока с текстом',
            ],
            [
                'id' => 3,
                'name' => 'Эвакуатор для внедорожника',
                'slug' => 'evakuator-dlya-vnedorozhnika',
                'price' => 3000,
                'order' => 3,
                'icon' => '/img/dzhip.png',
                'meta_title' => 'Эвакуатор для внедорожника',
                'meta_description' => 'Краткое описание для Эвакуатор для внедорожника',
                'desc1_title' => 'Заголовок для блока с текстом',
                'desc1_text' => 'Текст для блока с текстом',
            ],
            [
                'id' => 4,
                'name' => 'Эвакуатор для минивена',
                'slug' => 'evakuator-dlya-minivena',
                'price' => 2800,
                'order' => 4,
                'icon' => '/img/mbus.png',
                'meta_title' => 'Эвакуатор для минивена',
                'meta_description' => 'Краткое описание для Эвакуатор для минивена',
                'desc1_title' => 'Заголовок для блока с текстом',
                'desc1_text' => 'Текст для блока с текстом',
            ],
            [
                'id' => 5,
                'name' => 'Эвакуатор для Газели',
                'slug' => 'evakuator-dlya-gazeli',
                'price' => 3000,
                'order' => 5,
                'icon' => '/img/gazel.png',
                'meta_title' => 'Эвакуатор для Газели',
                'meta_description' => 'Краткое описание для Эвакуатор для Газели',
                'desc1_title' => 'Заголовок для блока с текстом',
                'desc1_text' => 'Текст для блока с текстом',
            ],
            [
                'id' => 6,
                'name' => 'Эвакуатор для спецтехники и трактора',
                'slug' => 'evakuator-dlya-spectekhniki-i-traktora',
                'price' => 4000,
                'order' => 6,
                'icon' => '/img/spez.png',
                'meta_title' => 'Эвакуатор для спецтехники и трактора',
                'meta_description' => 'Краткое описание для Эвакуатор для спецтехники и трактора',
                'desc1_title' => 'Заголовок для блока с текстом',
                'desc1_text' => 'Текст для блока с текстом',
            ],
        ]);
    }
}