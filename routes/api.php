<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/informations', [App\Http\Controllers\Api\InformationsController::class, 'get'])->name('getInformations');

Route::post('/reservation', [App\Http\Controllers\Api\ReservationController::class, 'book'])->name('book');

Route::post('/reservation/annulation/{token}', [App\Http\Controllers\Api\ReservationController::class, 'cancel'])->name('cancel');

Route::post('/contact', [App\Http\Controllers\Api\ContactController::class, 'send'])->name('send');

Route::post('auth/register', [\App\Http\Controllers\Api\ApiTokenController::class, 'register']);
Route::post('auth/login', [\App\Http\Controllers\Api\ApiTokenController::class, 'login']);
Route::middleware('auth:sanctum')->post('auth/me', [\App\Http\Controllers\Api\ApiTokenController::class, 'me']);
Route::middleware('auth:sanctum')->post('auth/logout', [\App\Http\Controllers\Api\ApiTokenController::class, 'logout']);

Route::apiResource('articles', \App\Http\Controllers\Api\ArticlesController::class );
