<?php

use App\Http\Controllers\frontend\tools\indexController;
use App\Http\Controllers\frontend\tools\RobotsTxtController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/tools',[indexController::class,'index'])->name('tools.home');
Route::get('/character-count',[indexController::class,'character_count'])->name('tools.character-count');
Route::get('/qr-generator',[indexController::class,'qr_generator'])->name('tools.qr-generator');
Route::get('/favicon-generator',[indexController::class,'favicon_generator'])->name('tools.favicon-generator');
Route::get('/schema-tester',[indexController::class,'schemaTester'])->name('tools.schema-tester');
Route::get('/schema-generator',[indexController::class,'schemaGenerator'])->name('tools.schema-generator');
Route::get('/xml-sitemap-generator',[indexController::class,'sitemapGenerator'])->name('tools.sitemap-generator');
Route::get('/robots-txt-generator',[RobotsTxtController::class,'index'])->name('tools.robots-txt-generator');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
require __DIR__ . '/admin.php';
