<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('telegram_bot_logs', function (Blueprint $table) {
            $table->id();
            $table->string('chat_id');
            $table->string('status')->nullable();
            $table->string('name')->nullable();
            $table->string('tel')->nullable();
            $table->string('address')->nullable();
            $table->string('transport')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('telegram_bot_logs');
    }
};
