<?php

namespace App\Http\Controllers;

use App\Http\Requests\QrCodeRequest;

class QRCodeController extends Controller
{
    public function index(QrCodeRequest $request)
    {
        return view('qrcode', $request->validated());
    }
}
