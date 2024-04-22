<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QrCodeRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QRCodeController extends Controller
{
    public function generate(Request $request)
    {
        try {
            $request->validate([
                'size' => 'bail|required|numeric|integer|min:10|max:1000',
                'data' => 'required',
            ]);

            $size = $request->input('size', 100);
            $data = $request->input('data');
    
            $qrCode = QrCode::format('png')->margin(1)->size($size)->generate($data);
    
            return response($qrCode, Response::HTTP_OK)->header('Content-Type', 'image/png');
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
