<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('icon');
            $table->integer('price');
            $table->integer('order')->default(99);
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('desc1_title')->nullable();
            $table->text('desc1_text')->nullable();
            $table->string('desc2_title')->nullable();
            $table->text('desc2_text')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
