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

        # Принимаем запрос
        $data = json_decode(file_get_contents('php://input'), TRUE);

        file_put_contents(public_path('text.txt'), $data);

        # Обрабатываем ручной ввод или нажатие на кнопку
        $data = $data['callback_query'] ? $data['callback_query'] : $data['message'];

        # Записываем сообщение пользователя
        $message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']),'utf-8');

        # Обрабатываем сообщение
        switch ($message)
        {
            case 'текст':
                $method = 'sendMessage';
                $send_data = [
                    'text'   => 'Вот мой ответ'
                ];
                break;

            case 'кнопки':
                $method = 'sendMessage';
                $send_data = [
                    'text'   => 'Вот мои кнопки',
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard' => [
                            [
                                ['text' => 'Видео'],
                                ['text' => 'Кнопка 2'],
                            ],
                            [
                                ['text' => 'Кнопка 3'],
                                ['text' => 'Кнопка 4'],
                            ]
                        ]
                    ]
                ];
                break;


            case 'видео':
                $method = 'sendVideo';
                $send_data = [
                    'video'   => 'https://chastoedov.ru/video/amo.mp4',
                    'caption' => 'Вот мое видео',
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard' => [
                            [
                                ['text' => 'Кнопка 1'],
                                ['text' => 'Кнопка 2'],
                            ],
                            [
                                ['text' => 'Кнопка 3'],
                                ['text' => 'Кнопка 4'],
                            ]
                        ]
                    ]
                ];
                break;

            default:
                $method = 'sendMessage';
                $send_data = [
                    'text' => 'Не понимаю о чем вы :('
                ];
        }

        # Добавляем данные пользователя
        $send_data['chat_id'] = $data['chat']['id'];

        $res = $this->sendTelegram($method, $send_data);
    }

    public function sendTelegram($method, $data, $headers = [])
    {
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
