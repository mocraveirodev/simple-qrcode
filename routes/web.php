<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QRCodeController;


Route::get('/', function () {
    return redirect()->route('qrcode');
});

Route::get('/qr-code', [QRCodeController::class, 'index'])
    ->name('qrcode');
