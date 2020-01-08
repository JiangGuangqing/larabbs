<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BasicController;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Controller extends BasicController
{
    //

    public function errorResponse($statusCode, $message = null, $code = 0)
    {
        throw new HttpException($statusCode, $message, null, [], $code);
    }
}
