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

    public function update(Request $request)
    {
        $this->validate($request, [
            'pages' => 'required',
            'about_text' => 'required',
            'prices_text' => 'required',
            'advantages_text' => 'required',
        ]);

        if(isset($request->pages))
        {
            foreach($request->pages as $p)
            {
                $page = Page::find($p['id']);
                $page->tgprice = $p['tgprice'];
                $page->save();
            }
        }

        $telegramBotData = TelegramBotData::find(1);

        $telegramBotData->about_text = $request->about_text;
        $telegramBotData->prices_text = $request->prices_text;
        $telegramBotData->advantages_text = $request->advantages_text;

        $telegramBotData->save();
    }
}
