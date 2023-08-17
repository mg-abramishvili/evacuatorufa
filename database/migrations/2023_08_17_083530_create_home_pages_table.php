<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->longText('text1')->nullable();
            $table->string('text1_header')->nullable();
            $table->longText('text2')->nullable();
            $table->string('text2_header')->nullable();
            $table->longText('text3')->nullable();
            $table->string('text3_header')->nullable();
            $table->longText('text4')->nullable();
            $table->string('text4_header')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
