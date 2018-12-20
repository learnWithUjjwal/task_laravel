<?php

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

Route::resource('users', 'UserController');
Route::get('users/login', 'UserController@login')->name('users.login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify_email', 'UserController@verify_email_view');
Route::get('/verify-email/{v_code}/user_id/{user_id}', 'UserController@verify_mail');
