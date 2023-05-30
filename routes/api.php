<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route:: get('/hello', function(){
    $data=["message"=>"hello word"];
    //return response()->json($data); //JS11 praktikum1-return response berupa json
    return"hello world"; //JS11 praktikum1-return response tidak berupa json (tidak mnegimplementasi REST API)
});

Route::apiResource('/mahasiswa', MahasiswaController::class);
//JS13 - Praktikum 1
Route::post('/login',[ApiAuthController::class, 'login']);
//JS13 - Praktikum 2
Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('/mahasiswa', MahasiswaController::class);
    Route::get('/logout', [ApiAuthController::class, 'logout']);
});