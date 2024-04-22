<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\QRCodeController;

Route::get('/qr-code', [QRCodeController::class, 'generate']);
