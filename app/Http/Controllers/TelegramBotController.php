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
        $data = $request->callback_query ? $request->callback_query : $request->message;

        $message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']), 'utf-8');

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

        $send_data['chat_id'] = $data['chat']['id'];

        $this->sendTelegram($method, $send_data);
    }

    public function sendTelegram($method, $send_data)
    {
        define('TOKEN', env('TELEGRAM_BOT_TOKEN'));

        file_put_contents(public_path('text.txt'), TOKEN);
    }
}
