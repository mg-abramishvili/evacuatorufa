<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdvantageSeeder extends Seeder
{
    public function run()
    {
        DB::table('advantages')->insert([
            [
                'id' => 1,
                'title' => 'Все работы по эвакуации застрахованы',
                'text' => null,
                'icon' => '/img/shield-fill-check.svg',
            ],
            [
                'id' => 2,
                'title' => 'Удобный способ оплаты',
                'text' => 'наличные, безналичный расчет, Сбербанк Онлайн',
                'icon' => '/img/credit-card-2-back-fill.svg',
            ],
            [
                'id' => 3,
                'title' => 'Подача эвакуатора от 20 минут',
                'text' => null,
                'icon' => '/img/clock-fill.svg',
            ],
            [
                'id' => 4,
                'title' => 'Самые низкие цены в Уфе',
                'text' => null,
                'icon' => '/img/trophy-fill.svg',
            ],
        ]);
    }
}