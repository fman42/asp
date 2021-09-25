<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('article')->group(function ($route) {
    $route->post('comment', [APIController::class, 'makeComment']);
    $route->patch('like', [APIController::class, 'incrementLike']);
    $route->patch('view', [APIController::class, 'incrementView']);
});

