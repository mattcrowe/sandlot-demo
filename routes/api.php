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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

# players
Route::get('players/{player}', 'Api\PlayersController@show');
Route::get('players', 'Api\PlayersController@index');

# teams
Route::get('teams/{team}', 'Api\TeamsController@show');
Route::put('teams/{team}', 'Api\TeamsController@update');
Route::delete('teams/{team}', 'Api\TeamsController@destroy');
Route::get('teams', 'Api\TeamsController@index');
Route::post('teams', 'Api\TeamsController@store');