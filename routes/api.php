<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ShowController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::post('/addbooking',[BookingController::class,'addbooking']);
Route::post('/addshow',[ShowController::class,'addshow']);
Route::get('/get_booking_details',[BookingController::class,'get_booking_details']);
Route::get('/get_user_details',[UserController::class,'get_user_details']);
Route::get('/get_show_details',[ShowController::class,'get_show_details']);
Route::get('/get_show_statistics',[ShowController::class,'get_show_statistics']);