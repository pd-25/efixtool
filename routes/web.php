<?php

use App\Http\Controllers\frontend\tools\indexController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/tools',[indexController::class,'index'])->name('tools.home');
Route::get('/character-count',[indexController::class,'character_count'])->name('tools.character-count');
Route::get('/qr-generator',[indexController::class,'qr_generator'])->name('tools.qr-generator');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
require __DIR__ . '/admin.php';