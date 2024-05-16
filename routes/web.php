<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::post('/', 'App\Http\Controllers\AUTH\LoginController@login');
Route::post('/login', 'App\Http\Controllers\AUTH\LoginController@login');
Route::get('/bycrypt', 'App\Http\Controllers\AUTH\LoginController@bycrypt');
Route::get('/logout', 'App\Http\Controllers\AUTH\LoginController@logout');
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard.index');
Route::get('/home', 'App\Http\Controllers\AUTH\LoginController@home');
Route::get('/profile', 'App\Http\Controllers\ProfileController@index');
Route::post('/profile', 'App\Http\Controllers\ProfileController@updatePI');
Route::post('/profile', 'App\Http\Controllers\ProfileController@updateProfile');
Route::post('/change-password', 'App\Http\Controllers\ProfileController@updatePassword');
