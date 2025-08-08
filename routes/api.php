<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SchemaTesterController;
use App\Http\Controllers\Api\SitemapController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/validate-schema', [SchemaTesterController::class, 'validateSchema']);
Route::post('/analyze-url', [SchemaTesterController::class, 'analyzeUrl']);
Route::post('/generate-sitemap', [SitemapController::class, 'generate']);
