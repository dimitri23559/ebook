<?php

use App\Http\Controllers\Bookcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeloController;
use App\Http\Controllers\SIswaController;




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

Route ::resource('siswa',SIswaController::class);
Route ::resource('books',Bookcontroller::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("halo",function(){
    return['me'=>'test'];
});


Route::get('helocontroller',[HeloController::class,'index']);


Route::get('siswa',[ SiswaController::class,'index']);
Route::get('siswa/{id}',[SiswaController::class,'show']);
Route::post('siswa',[SiswaController::class,'store']);
Route::post('siswa/{id}',[SiswaController::class,'update']);
Route::delete('siswa/{id}',[SiswaController::class,'destroy']);


