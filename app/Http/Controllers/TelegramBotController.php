<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Page;
use App\Models\Advantage;
use App\Mail\LeadMail;
use Illuminate\Support\Facades\Mail;

class TelegramBotController extends Controller
{
    public function index(Request $request)
    {
        if($request->callback_query && isset($request->callback_query))
        {
            $messageData = $request->callback_query;
            $message = mb_strtolower($messageData['data'], 'utf-8');
            $chatID = $messageData['message']['chat']['id'];
        }
        else
        {
            $messageData = $request->message;
            $message = mb_strtolower($messageData['text'], 'utf-8');
            $chatID = $messageData['chat']['id'];
        }

        file_put_contents(public_path('text.txt'), "");
        file_put_contents(public_path('text.txt'), print_r($message, 1)."\n", FILE_APPEND);

        if($message == '/start' || $message == 'назад')
        {
            $method = 'sendMessage';
            $sendData = [
                'text'   => 'Добро пожаловать в службу эвакуации АвтоВезёт!',
                'reply_markup' => [
                    'resize_keyboard' => true,
                    'keyboard' => [
                        [
                            ['text' => '⚡️ Вызвать эвакуатор'],
                        ],
                        [
                            ['text' => '💵 Цены'],
                            ['text' => '✅ Преимущества'],
                        ],
                        [
                            ['text' => '📸 Фотогалерея'],
                            ['text' => 'ℹ️ О нас'],
                        ]
                    ]
                ]
            ];
        }

        elseif(
            str_contains($message, 'вызвать эвакуатор') ||
            str_contains($message, 'нужен эвакуатор')
        ) {
            $pages = Page::all();

            $method = 'sendMessage';
            $sendData = [
                'text'   => 'Для какого транспорта вам нужен эвакуатор?',
                'reply_markup' => [
                    'inline_keyboard' => [],
                ]
            ];

            foreach($pages as $page) {
                $sendData["reply_markup"]["inline_keyboard"][] = [['text' => str_replace("Эвакуатор ", "", $page->name), 'callback_data' => "page_" . $page->id ]];
            }
        }

        elseif(
            str_contains($message, 'цена') ||
            str_contains($message, 'цены') ||
            str_contains($message, 'стоить') ||
            str_contains($message, 'стоимость')
        ) {
            $pages = Page::all();
            $pgs = [];
            foreach($pages as $p) {
                $pgs[] = "💵 " . $p->name . " от " . $p->price . "₽";
            }

            $method = 'sendMessage';
            $sendData = [
                'text'   => implode("\n\n", $pgs),
            ];
        }

        elseif($message == '✅ преимущества')
        {
            $advantages = Advantage::all();
            $adv = [];
            foreach($advantages as $a) {
                $adv[] = "✅ " . $a->title;
            }

            $method = 'sendMessage';
            $sendData = [
                'text'   => implode("\n\n", $adv),
            ];
        }

        elseif(
            str_contains($message, 'page_')
        ) {
            $page = Page::where('id', str_replace("page_", "", $message))->first();

            if($page) {
                $method = 'sendMessage';
                $sendData = [
                    'text'   => 'По какому адресу подать ' . $page->name . '?',
                ];
            } else {
                $method = 'sendMessage';
                $sendData = [
                    'text' => 'Я вас, к сожалению, не понимаю. ☹️ Попробуйте воспользоваться кнопочным меню. Если меню скрыто, нажмите иконку 🎛 в правом нижнем углу. Чтобы обновить бота, нажмите сюда /start'
                ];
            }
        }

        elseif(
            str_contains($message, 'фотогалерея')
        ) {
            $method = 'sendMessage';
            $sendData = [
                'text' => 'caption',
            ];
        }

        else
        {
            $method = 'sendMessage';
            $sendData = [
                'text' => 'Я вас, к сожалению, не понимаю. ☹️ Попробуйте воспользоваться кнопочным меню. Если меню скрыто, нажмите иконку 🎛 в правом нижнем углу. Чтобы обновить бота, нажмите сюда /start'
            ];
        }
        
        $sendData['chat_id'] = $chatID;

        $this->sendTelegram($method, $sendData);
    }

    public function sendTelegram($method, $sendData, $headers = [])
    {
        // file_put_contents(public_path('text.txt'), '$sendData: '.print_r($sendData, 1)."\n", FILE_APPEND);
        
        define('TOKEN', env('TELEGRAM_BOT_TOKEN'));

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.telegram.org/bot' . TOKEN . '/' . $method,
            CURLOPT_POSTFIELDS => json_encode($sendData),
            CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers)
        ]);   
        
        $result = curl_exec($curl);

        curl_close($curl);

        // file_put_contents(public_path('text.txt'), "");
        // file_put_contents(public_path('text.txt'), print_r(json_decode($result, 1) ? json_decode($result, 1) : $result)."\n", FILE_APPEND);

        return (json_decode($result, 1) ? json_decode($result, 1) : $result);
    }
}
