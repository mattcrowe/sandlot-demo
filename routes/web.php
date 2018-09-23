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

Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', function () {
    return redirect('/admin');
});

Route::get('/', function () {
    return view('welcome');
});