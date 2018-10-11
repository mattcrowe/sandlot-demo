<?php

use Illuminate\Http\Request;

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

# notes
Route::get('notes/{note}', 'Api\NotesController@show');
Route::put('notes/{note}', 'Api\NotesController@update');
Route::delete('notes/{note}', 'Api\NotesController@destroy');
Route::get('notes', 'Api\NotesController@index');
Route::post('notes', 'Api\NotesController@store');