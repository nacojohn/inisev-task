<?php

use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WebsitePostController;
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

Route::post('subscribe', [SubscriberController::class, 'subscribe']);
Route::post('create-post', [WebsitePostController::class, 'post']);