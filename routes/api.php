<?php

use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\OrderController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('numbers/count/{start}/{end}',[MainController::class,'count_numbers']);
Route::get('alphabetic/index/{input}',[MainController::class,'alphabetic_index']);
Route::get('get_num_moves_to_be_zeros',[MainController::class,'get_num_moves_to_be_zeros']);
Route::post('order/store',[OrderController::class,'store']);
