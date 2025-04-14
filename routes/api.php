<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/midtrans/webhook', [PaymentController::class, 'handleWebhook']);
Route::post('/payment/{enrollment}', [PaymentController::class, 'getSnapToken']);