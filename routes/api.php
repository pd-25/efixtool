<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SchemaTesterController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/validate-schema', [SchemaTesterController::class, 'validateSchema']);
Route::post('/analyze-url', [SchemaTesterController::class, 'analyzeUrl']);
