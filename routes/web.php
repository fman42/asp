<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'renderMain'])->name('index');
Route::get('/catalog', [IndexController::class, 'renderCatalog'])->name('catalog');
Route::get('/article/{article_id}', [IndexController::class, 'renderArticle'])->name('article');
