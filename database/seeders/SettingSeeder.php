<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            [
                'id' => 1,
                'tel1' => '3472999797',
                'tel2' => '9053529797',
                'email' => '2999797@mail.ru',
                'address' => 'г. Уфа, ул. Степана Злобина, д. 6',
                'vk_link' => 'https://vk.com/evacar102',
                'instagram_link' => 'https://www.instagram.com/evakuator_ufa_102/',
            ],
        ]);
    }
}