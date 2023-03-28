<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function respondWithSuccess($message = '', $data = [], $code = 200)
    {
        return response()->json([
            'status'   => true,
            'message'  => $message,
            'data'     => $data
        ], $code);
    }
    protected function respondWithError($message, $data = [], $code = 203)
    {
        return response()->json([
            'status'   => false,
            'errors'  => $message,
            'data'     => $data
        ], $code);
    }
}
