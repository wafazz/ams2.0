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

//login//
Route::post('/', 'App\Http\Controllers\AUTH\LoginController@login');
Route::post('/login', 'App\Http\Controllers\AUTH\LoginController@login');
Route::get('/bycrypt', 'App\Http\Controllers\AUTH\LoginController@bycrypt');

//logout//
Route::get('/logout', 'App\Http\Controllers\AUTH\LoginController@logout');

//dashbboard//
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard.index');
Route::get('/home', 'App\Http\Controllers\AUTH\LoginController@home');

//profile
Route::get('/profile', 'App\Http\Controllers\ProfileController@index');
Route::post('/profile', 'App\Http\Controllers\ProfileController@updatePI');
Route::post('/update-profile', 'App\Http\Controllers\ProfileController@updateProfile');
Route::post('/change-password', 'App\Http\Controllers\ProfileController@updatePassword');

//users//
Route::get('/user', 'App\Http\Controllers\UserController@index');
Route::post('/user', 'App\Http\Controllers\UserController@regNew');
Route::get('/user-details/{id}', 'App\Http\Controllers\UserController@userDetails');
Route::get('/activate-user/{id}', 'App\Http\Controllers\UserController@activateUser');
Route::get('/banned-user/{id}', 'App\Http\Controllers\UserController@bannedUser');
Route::get('/unbanned-user/{id}', 'App\Http\Controllers\UserController@unbannedUser');

//product//

Route::get('/product/create-category-brand', 'App\Http\Controllers\ProductController@categoryIndex');
Route::post('/add-category', 'App\Http\Controllers\ProductController@categoryAdd');
Route::post('/add-brand', 'App\Http\Controllers\ProductController@brandAdd');
