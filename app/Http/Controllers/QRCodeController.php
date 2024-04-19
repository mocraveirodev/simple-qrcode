<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QrCodeRequest;

class QRCodeController extends Controller
{
    public function index(QrCodeRequest $request)
    {
        return view('qrcode', $request->validated());
    }
}
