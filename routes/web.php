<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CostumerController;

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
    return view('home');
});

//admin dashboard
Route::get('admin', function () {
    return view('dashboard');
});

//Room type routes
Route::resource('admin/roomtype',RoomtypeController::class);
Route::get('admin/roomtype/{id}/delete',[RoomtypeController::class,'destroy']);
//with resource route we don't need to repete the things
/*Route::get('roomtype',[RoomtypeController::class,'index']);
Route::get('roomtype',[RoomtypeController::class,'create']);
Route::post('roomtype',[RoomtypeController::class,'index']);
Route::put('roomtype',[RoomtypeController::class,'index']);
Route::delete('roomtype',[RoomtypeController::class,'destroy']);*/

//Room routes
Route::resource('admin/room',RoomController::class);
Route::get('admin/room/{id}/delete',[RoomController::class,'destroy']);

//Costumer admin routes
Route::resource('admin/costumer',CostumerController::class);
Route::get('admin/costumer/{id}/delete',[CostumerController::class,'destroy']);