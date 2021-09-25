<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendErrorResponse(string $errorName)
    {
        return response()->json(['response' => false, 'error' => $errorName], 400);
    }

    public function sendSuccessResponse(array $bag)
    {
        return response()->json(array_merge(['response' => true], $bag));
    }
}
