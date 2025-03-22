<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/tools', function () {
    return view('frontend.tools.character-count');
})->name('tools.character-count');

Route::get('/qr-generator', function () {
    return view('frontend.tools.qrcode');
})->name('tools.qr-generator');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
require __DIR__ . '/admin.php';