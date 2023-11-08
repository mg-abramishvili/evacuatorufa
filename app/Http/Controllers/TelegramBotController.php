<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Page;
use App\Models\Advantage;
use App\Models\TelegramBotData;
use App\Models\TelegramBotLog;
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

        // file_put_contents(public_path('text.txt'), "");
        // file_put_contents(public_path('text.txt'), print_r($messageData, 1)."\n", FILE_APPEND);
        
        $telegramBotData = TelegramBotData::find(1);

        $telegramBotLog = TelegramBotLog::firstOrCreate(
            ['chat_id' => $chatID],
        );

        if($message == '/start' || $message == 'назад' || $message == 'отмена' || $message == 'отменить заявку' || $message == 'главное меню')
        {
            $method = 'sendMessage';
            $sendData = [
                'text'   => 'Здравствуйте!' . "\n\n" . 'Я-виртуальный помощник службы эвакуации АвтоВезет.' . "\n\n" . 'Вы можете связаться с нами по телефону: +7(905)352-97-97' . "\n\n" . 'Или воспользоваться кнопками ниже, для этого нажмите нужную вам кнопку.',
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

            $telegramBotLog->status = null;
            $telegramBotLog->transport = null;
            $telegramBotLog->tel = null;
            $telegramBotLog->save();
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
                $pgs[] = "💵 " . $p->name . " от " . $p->tgprice . "₽";
            }

            $method = 'sendMessage';
            $sendData = [
                'text'   => implode("\n\n", $pgs) . "\n\n" . str_replace(array("<p>", "</p>", "<strong>", "</strong>"), array("", "\n\n", "<b>", "</b>"), $telegramBotData->prices_text),
            ];
        }

        elseif(
            str_contains($message, 'преимущества')
        ) {
            $advantages = Advantage::all();
            $adv = [];
            foreach($advantages as $a) {
                $adv[] = isset($a->text) ? "✅ " . $a->title . " - " . $a->text : "✅ " . $a->title;
            }

            $method = 'sendMessage';
            $sendData = [
                'text'   => implode("\n\n", $adv),
            ];
        }

        elseif(
            str_contains($message, 'о нас')
        ) {
            $method = 'sendMessage';
            $sendData = [
                'text'   => str_replace(array("<p>", "</p>", "<strong>", "</strong>"), array("", "\n\n", "<b>", "</b>"), $telegramBotData->about_text),
                'parse_mode' => 'HTML',
            ];
        }

        elseif(
            str_contains($message, 'фотогалерея')
        ) {
            $method = 'sendMediaGroup';
            $sendData = [
                'media' => [
                    [
                        'type' => 'photo',
                        'media' => 'https://evacuatorufa.ru/img/evc01.jpg',
                    ],
                    [
                        'type' => 'photo',
                        'media' => 'https://evacuatorufa.ru/img/evc02.jpg',
                    ],
                    [
                        'type' => 'photo',
                        'media' => 'https://evacuatorufa.ru/img/evc03.jpg',
                    ],
                    [
                        'type' => 'photo',
                        'media' => 'https://evacuatorufa.ru/img/evc04.jpg',
                    ],
                    [
                        'type' => 'photo',
                        'media' => 'https://evacuatorufa.ru/img/evc05.jpg',
                    ],
                    [
                        'type' => 'photo',
                        'media' => 'https://evacuatorufa.ru/img/evc06.jpg',
                    ],
                    [
                        'type' => 'photo',
                        'media' => 'https://evacuatorufa.ru/img/evc07.jpg',
                    ],
                    [
                        'type' => 'photo',
                        'media' => 'https://evacuatorufa.ru/img/evc08.jpg',
                    ],
                    [
                        'type' => 'photo',
                        'media' => 'https://evacuatorufa.ru/img/evc09.jpg',
                    ],
                    [
                        'type' => 'photo',
                        'media' => 'https://evacuatorufa.ru/img/evc10.jpg',
                    ]
                ]
            ];
        }

        elseif(
            str_contains($message, 'page_')
        ) {
            $page = Page::where('id', str_replace("page_", "", $message))->first();

            if($page) {
                $method = 'sendMessage';
                $sendData = [
                    'text'   => 'Ваш номер телефона?',
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard' => [
                            [
                                ['text' => 'Отмена']
                            ],
                        ],
                    ]
                ];

                $telegramBotLog->transport = $page->name;
                $telegramBotLog->status = 'enterTel';
                $telegramBotLog->save();
            } else {
                $method = 'sendMessage';
                $sendData = [
                    'text' => 'Я вас, к сожалению, не понимаю. ☹️ Попробуйте воспользоваться кнопочным меню. Если меню скрыто, нажмите иконку 🎛 в правом нижнем углу. Чтобы обновить бота, нажмите сюда /start',
                ];
            }
        }

        elseif($telegramBotLog->status && $telegramBotLog->status == 'enterTel')
        {
            $method = 'sendMessage';
            $sendData = [
                'text'   => "Заявка отправлена! Мы с вами свяжемся. 😊",
                'reply_markup' => [
                    'resize_keyboard' => true,
                    'keyboard' => [
                        [
                            ['text' => 'Главное меню']
                        ],
                    ],
                ]
            ];

            $telegramBotLog->status = 'yourOrder';
            $telegramBotLog->tel = $message;
            $telegramBotLog->save();

            $lead = new Lead();

            $lead->name = "Telegram Bot";
            $lead->tel = $message;
            $lead->text = $telegramBotLog->transport;

            $lead->save();

            // Mail::to('2661184@mail.ru')->send(new LeadMail($lead));
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

        return (json_decode($result, 1) ? json_decode($result, 1) : $result);
    }
}
