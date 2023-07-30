<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Page;

Route::get('/', function () {
    return view('home');
});

Route::get('/evakuator-dlya-kommercheskogo-transporta', function () {
    $page = Page::where('slug', 'evakuator-dlya-kommercheskogo-transporta')->first();

    return view('page', compact('page'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
