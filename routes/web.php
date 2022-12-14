<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user',[UserController::class,'getuser']);

Route::get('/create',[UserController::class,'createTransaction']);

Route::post('/create',[UserController::class,'store']);

Route::get('/tb',[UserController::class,'tb']);
Route::get('/comments',[UserController::class,'comments']);


Route::get('/room',[RoomController::class,'index']);

Route::get('/reservations',[RoomController::class,'res']);

Route::get('/users/resv',[RoomController::class,'users']);


Route::get('/city',[RoomController::class,'city']);
