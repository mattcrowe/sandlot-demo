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

# players
Route::get('players/{player}', 'Api\PlayersController@show');
Route::put('players/{player}', 'Api\PlayersController@update');
Route::delete('players/{player}', 'Api\PlayersController@destroy');
Route::get('players', 'Api\PlayersController@index');
Route::post('players', 'Api\PlayersController@store');

# teams
Route::get('teams/{team}', 'Api\TeamsController@show');
Route::put('teams/{team}', 'Api\TeamsController@update');
Route::delete('teams/{team}', 'Api\TeamsController@destroy');
Route::get('teams', 'Api\TeamsController@index');
Route::post('teams', 'Api\TeamsController@store');