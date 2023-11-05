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
        }
        else
        {
            $messageData = $request->message;
            $message = mb_strtolower($messageData['text'], 'utf-8');
        }

        file_put_contents(public_path('text.txt'), "");
        file_put_contents(public_path('text.txt'), print_r($message, 1)."\n", FILE_APPEND);

        if($message == '/start' || $message == 'назад')
        {
            $method = 'sendMessage';
            $send_data = [
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
            $send_data = [
                'text'   => 'Для какого транспорта вам нужен эвакуатор?',
                'reply_markup' => [
                    'inline_keyboard' => [
                        [
                            [
                                'text' => 'Test',
                                'callback_data' => 'test_1',
                            ],
                        ]
                    ],
                ]
            ];

            // foreach($pages as $page) {
            //     $send_data["reply_markup"]["inline_keyboard"][] = [['text' => str_replace("Эвакуатор ", "", $page->name), 'callback_data' => "page_" . $page->id ]];
            // }
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
            $send_data = [
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
            $send_data = [
                'text'   => implode("\n\n", $adv),
            ];
        }

        // elseif($message == 'test_1')
        // {
        //     $method = 'sendMessage';
        //     $send_data = [
        //         'text'   => 'По какому адресу подать эвакуатор?',
        //     ];
        // }

        else
        {
            $method = 'sendMessage';
            $send_data = [
                'text' => 'Я вас, к сожалению, не понимаю. ☹️ Попробуйте воспользоваться кнопочным меню. Если меню скрыто, нажмите иконку 🎛 в правом нижнем углу. Чтобы обновить бота, нажмите сюда /start'
            ];
        }
        

        $send_data['chat_id'] = $messageData['chat']['id'];

        $this->sendTelegram($method, $send_data);
    }

    public function sendTelegram($method, $send_data, $headers = [])
    {
        // file_put_contents(public_path('text.txt'), '$send_data: '.print_r($send_data, 1)."\n", FILE_APPEND);
        
        define('TOKEN', env('TELEGRAM_BOT_TOKEN'));

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.telegram.org/bot' . TOKEN . '/' . $method,
            CURLOPT_POSTFIELDS => json_encode($send_data),
            CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers)
        ]);   
        
        $result = curl_exec($curl);

        curl_close($curl);

        // file_put_contents(public_path('text.txt'), "");
        // file_put_contents(public_path('text.txt'), print_r(json_decode($result, 1) ? json_decode($result, 1) : $result)."\n", FILE_APPEND);

        return (json_decode($result, 1) ? json_decode($result, 1) : $result);
    }
}
