<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramBotLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'status',
        'name',
        'tel',
        'address',
        'transport',
    ];
}
