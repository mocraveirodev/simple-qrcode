<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QRCodeController extends Controller
{
    public function index(Request $request)
    {
            return view('qrcode', $request->all());
    }
}
