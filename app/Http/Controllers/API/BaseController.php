<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message, $code)
    {
    
        $response = [
            'success' => true,
            'code'    => $code,
            'message' => $message,
            'record'    => $result,
        ];

        return response()->json($response, $code);
    
    }
}
