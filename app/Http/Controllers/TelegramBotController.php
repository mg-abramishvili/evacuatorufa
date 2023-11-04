<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Mail\LeadMail;
use Illuminate\Support\Facades\Mail;

class TelegramBotController extends Controller
{
    public function index(Request $request)
    {
        define('TOKEN', env('TELEGRAM_BOT_TOKEN'));
        
        $data = $request->getContent();
        
        // file_put_contents(public_path('text.txt'), '$data: '.print_r($data, 1)."\n", FILE_APPEND);

        $data = $data['callback_query'] ? $data['callback_query'] : $data['message'];
        
        $message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']),'utf-8');

        file_put_contents(public_path('text.txt'), '$message: '.print_r($message, 1)."\n", FILE_APPEND);

        // switch ($message)
        // {
        //     case 'текст':
        //         $method = 'sendMessage';
        //         $send_data = [
        //             'text'   => 'Вот мой ответ'
        //         ];
        //         break;

        //     case 'кнопки':
        //         $method = 'sendMessage';
        //         $send_data = [
        //             'text'   => 'Вот мои кнопки',
        //             'reply_markup' => [
        //                 'resize_keyboard' => true,
        //                 'keyboard' => [
        //                     [
        //                         ['text' => 'Видео'],
        //                         ['text' => 'Кнопка 2'],
        //                     ],
        //                     [
        //                         ['text' => 'Кнопка 3'],
        //                         ['text' => 'Кнопка 4'],
        //                     ]
        //                 ]
        //             ]
        //         ];
        //         break;


        //     case 'видео':
        //         $method = 'sendVideo';
        //         $send_data = [
        //             'video'   => 'https://chastoedov.ru/video/amo.mp4',
        //             'caption' => 'Вот мое видео',
        //             'reply_markup' => [
        //                 'resize_keyboard' => true,
        //                 'keyboard' => [
        //                     [
        //                         ['text' => 'Кнопка 1'],
        //                         ['text' => 'Кнопка 2'],
        //                     ],
        //                     [
        //                         ['text' => 'Кнопка 3'],
        //                         ['text' => 'Кнопка 4'],
        //                     ]
        //                 ]
        //             ]
        //         ];
        //         break;

        //     default:
        //         $method = 'sendMessage';
        //         $send_data = [
        //             'text' => 'Не понимаю о чем вы :('
        //         ];
        // }

        $method = 'sendMessage';
        $send_data = [
            'text'   => 'Вот мой ответ'
        ];

        $send_data['chat_id'] = $data['chat']['id'];

        file_put_contents(public_path('send_data.txt'), '$send_data: '.print_r($send_data, 1)."\n", FILE_APPEND);

        $this->sendTelegram($method, $send_data);
    }

    public function sendTelegram($method, $data, $headers = [])
    {
        define('TOKEN', env('TELEGRAM_BOT_TOKEN'));

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.telegram.org/bot' . TOKEN . '/' . $method,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers)
        ]);   
        
        $result = curl_exec($curl);

        curl_close($curl);

        return (json_decode($result, 1) ? json_decode($result, 1) : $result);
    }
}
