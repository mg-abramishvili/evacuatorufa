<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Page;
use App\Models\HomePage;
use App\Models\Setting;
use App\Models\Advantage;
use App\Models\Question;
use App\Models\PricelistPage;
use App\Models\AboutPage;

Route::get('/', function () {
    $settings = Setting::find(1);
    $homePage = HomePage::find(1);
    $advantages = Advantage::all();
    $questions = Question::all();

    $pages = Page::orderBy('order', 'asc')->get();

    return view('home', compact('settings', 'homePage', 'pages', 'advantages', 'questions'));
});

Route::get('/p/{slug}', function ($slug) {
    $settings = Setting::find(1);
    $advantages = Advantage::all();
    $questions = Question::all();
    $pages = Page::orderBy('order', 'asc')->get();
    
    $page = Page::where('slug', $slug)->first();

    return view('page', compact('settings', 'page', 'pages', 'advantages', 'questions'));
});

Route::get('/o-nas', function () {
    $settings = Setting::find(1);
    $advantages = Advantage::all();
    $pages = Page::orderBy('order', 'asc')->get();
    $aboutPage = AboutPage::find(1);

    return view('onas', compact('settings', 'pages', 'advantages', 'aboutPage'));
});

Route::get('/kontakty', function () {
    $settings = Setting::find(1);
    $advantages = Advantage::all();
    $pages = Page::orderBy('order', 'asc')->get();

    return view('kontakty', compact('settings', 'pages', 'advantages'));
});

Route::get('/pricelist', function () {
    $settings = Setting::find(1);
    $advantages = Advantage::all();
    $pages = Page::orderBy('order', 'asc')->get();
    $pricelistPage = PricelistPage::find(1);

    return view('pricelist', compact('settings', 'pages', 'advantages', 'pricelistPage'));
});

Route::get('/otzyvy', function () {
    $settings = Setting::find(1);
    $advantages = Advantage::all();
    $pages = Page::orderBy('order', 'asc')->get();

    return view('otzyvy', compact('settings', 'pages', 'advantages'));
});

Route::post('_leads', [App\Http\Controllers\LeadController::class, 'store']);

// TELEGRAM BOT
Route::post('_telegram', [App\Http\Controllers\TelegramBotController::class, 'index']);

Route::get('/test', function () {
    $advantages = Advantage::all();
    $adv = [];
    foreach($advantages as $a) {
        $adv[] = "✔️" . $a->title;
    }

    implode($adv, ",");
});

// ADMIN
Route::get('admin', function () {
    return view('layouts.admin');
})->middleware(['auth']);

Route::prefix("admin")->middleware(['auth'])->group(function() {
    Route::get('{any}', function () {
        return view('layouts.admin');
    })->where('any', '.*');
});

// ADMIN SETTINGS
Route::get('_admin/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->middleware(['auth']);
Route::post('_admin/settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->middleware(['auth']);

// ADMIN HOMEPAGE
Route::get('_admin/homepage', [App\Http\Controllers\Admin\HomePageController::class, 'index'])->middleware(['auth']);
Route::post('_admin/homepage', [App\Http\Controllers\Admin\HomePageController::class, 'update'])->middleware(['auth']);

// ADMIN ABOUT-PAGE
Route::get('_admin/about-page', [App\Http\Controllers\Admin\AboutPageController::class, 'index'])->middleware(['auth']);
Route::post('_admin/about-page', [App\Http\Controllers\Admin\AboutPageController::class, 'update'])->middleware(['auth']);

// ADMIN PRICELIST-PAGE
Route::get('_admin/pricelist-page', [App\Http\Controllers\Admin\PricelistPageController::class, 'index'])->middleware(['auth']);
Route::post('_admin/pricelist-page', [App\Http\Controllers\Admin\PricelistPageController::class, 'update'])->middleware(['auth']);

// ADMIN LEADS
Route::get('_admin/leads', [App\Http\Controllers\Admin\LeadController::class, 'index'])->middleware(['auth']);
Route::get('_admin/lead/{id}', [App\Http\Controllers\Admin\LeadController::class, 'lead'])->middleware(['auth']);
Route::put('_admin/lead/{id}/update', [App\Http\Controllers\Admin\LeadController::class, 'update'])->middleware(['auth']);
Route::delete('_admin/lead/{id}/delete', [App\Http\Controllers\Admin\LeadController::class, 'delete'])->middleware(['auth']);

// ADMIN PAGES
Route::get('_admin/pages', [App\Http\Controllers\Admin\PageController::class, 'index'])->middleware(['auth']);
Route::get('_admin/page/{id}', [App\Http\Controllers\Admin\PageController::class, 'page'])->middleware(['auth']);
Route::put('_admin/page/{id}/update', [App\Http\Controllers\Admin\PageController::class, 'update'])->middleware(['auth']);
Route::delete('_admin/page/{id}/delete', [App\Http\Controllers\Admin\PageController::class, 'delete'])->middleware(['auth']);

// ADMIN FILE UPLOAD
Route::post('_admin/file/upload', [App\Http\Controllers\Admin\FileController::class, 'store']);

// AUTH
require __DIR__.'/auth.php';