<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\TelegramBotData;

class TelegramBotDataController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        $telegramBotData = TelegramBotData::firstOrCreate([
            'id' => 1,
        ]);

        return response()->json([
            'pages' => $pages,
            'telegram_bot_data' => $telegramBotData,
        ]);
    }
}
