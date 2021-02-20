<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\PharmacyController;
use App\Http\Controllers\API\RegisterController;

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

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [RegisterController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('/pharmacies',[PharmacyController::class, 'index']);
    Route::post('users/{user}',[UserController::class, 'update']);
    
    Route::get('/orders',[OrderController::class, 'index']);
    Route::post('/orders',[OrderController::class, 'create']);
    Route::get('/orders/{order}',[OrderController::class, 'show']);

});

