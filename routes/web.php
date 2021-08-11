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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/show_empty_room','App\Http\Controllers\PageRoomController@show_empty_room');
Route::get('/home/insertCustomers','App\Http\Controllers\PageRoomController@insertCustomers');
Route::get('/home/insertForReservation','App\Http\Controllers\PageRoomController@insertForReservation');
Route::get('/home/searchRoom','App\Http\Controllers\PageRoomController@searchRoom');
Route::get('/home/searchMail','App\Http\Controllers\PageRoomController@searchMail');
Route::get('/home/canceledReservation','App\Http\Controllers\PageRoomController@canceledReservation');
