<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\StaffDepartement;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;

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

//admin login
Route::get('admin/login', [AdminController::class,'login']);
Route::post('admin/login', [AdminController::class,'check_login']);
Route::get('admin/logout', [AdminController::class,'logout']);

//admin dashboard
Route::get('admin', [AdminController::class,'dashboard']);
/*Route::get('admin', function () {
    return view('dashboard');
});*/

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

//Delete Image 
Route::get('admin/roomtypeimage/delete/{id}',[RoomtypeController::class,'destroy_image']);

//Departement routes
Route::get('admin/departement/{id}/delete',[StaffDepartement::class,'destroy']);
Route::resource('admin/departement',StaffDepartement::class);


//Staff routes
//Staff Payement
Route::get('admin/staff/payements/{id}',[StaffController::class,'all_payements']);
Route::get('admin/staff/payement/{id}/add',[StaffController::class,'add_payement']);
Route::post('admin/staff/payement/{id}',[StaffController::class,'save_payement']);
Route::get('admin/staff/payement/{id}/{staff_id}/delete',[StaffController::class,'delete_payement']);
//Staff CRUD
Route::get('admin/staff/{id}/delete',[StaffController::class,'destroy']);
Route::resource('admin/staff',StaffController::class);


//Booking routes
Route::get('admin/booking/{id}/delete',[BookingController::class,'destroy']);
Route::get('admin/booking/available-rooms/{checkin_date}',[BookingController::class,'available_rooms']);
Route::resource('admin/booking',BookingController::class);