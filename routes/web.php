<?php

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

Route::get('/',[App\Http\Controllers\PageRoomController::class,'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('show_empty_room',[App\Http\Controllers\PageRoomController::class,'show_empty_room'])->name('show_empty_room');
Route::get('insertCustomers',[App\Http\Controllers\PageRoomController::class,'insertCustomers'])->name("insertCustomers");
Route::get('insertForReservation',[App\Http\Controllers\PageRoomController::class,'insertForReservation'])->name("insertForReservation");
Route::get('searchRoom',[App\Http\Controllers\PageRoomController::class,'searchRoom'])->name('searchRoom');
Route::get('searchMail',[App\Http\Controllers\PageRoomController::class,'searchMail'])->name('searchMail');
Route::get('canceledReservation',[App\Http\Controllers\PageRoomController::class,'canceledReservation'])->name("canceledReservation");
Route::get('canceledReservationDelete',[App\Http\Controllers\PageRoomController::class,'canceledReservationDelete'])->name("canceledReservationDelete");
