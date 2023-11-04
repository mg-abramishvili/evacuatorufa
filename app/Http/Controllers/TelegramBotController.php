<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Page;
use App\Mail\LeadMail;
use Illuminate\Support\Facades\Mail;

class TelegramBotController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->callback_query ? $request->callback_query : $request->message;

        $message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']), 'utf-8');

        if($message == '/start')
        {
            $method = 'sendMessage';
            $send_data = [
                'text'   => 'Добро пожаловать в службу эвакуации АвтоВезёт!',
                'reply_markup' => [
                    'resize_keyboard' => true,
                    'keyboard' => [
                        [
                            ['text' => '⚡️ Вызвать эвакуатор'],
                            ['text' => 'Цены 💵'],
                            ['text' => 'Наши преимущества ✔️'],
                            ['text' => 'Фотогалерея 📸'],
                        ]
                    ]
                ]
            ];
        }

        elseif($message == '⚡️ вызвать эвакуатор')
        {
            $pages = Page::all();

            $method = 'sendMessage';
            $send_data = [
                'text'   => 'Какой у вас транспорт?',
                'reply_markup' => [
                    'resize_keyboard' => true,
                    'keyboard' => [],
                ]
            ];

            foreach($pages as $page) {
                $send_data["reply_markup"]["keyboard"][] = [['text' => "$page->name"]];
            }
            $send_data["reply_markup"]["keyboard"][] = [['text' => "$page->name"]];
        }

        else
        {
            $method = 'sendMessage';
            $send_data = [
                'text' => 'Я вас, к сожалению, не понимаю. ☹️ Попробуйте воспользоваться кнопочным меню. Если меню скрыто, нажмите иконку 🎛 в правом нижнем углу. Чтобы обновить бота, нажмите сюда /start'
            ];
        }
        

        $send_data['chat_id'] = $data['chat']['id'];

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

        return (json_decode($result, 1) ? json_decode($result, 1) : $result);
    }
}
