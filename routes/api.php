<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * Eventos:
 * todos, noCaducados,
 */

Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return response()->json([
            'user' => $request->user(),
            'token' => $request->user()->token()
        ]);
    });
Route::get('events', 'EventController@nonExpiredEvents');


Route::group(['middleware' => 'auth:api'], function () {
    Route::get('logout', 'AuthController@logout');
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('signup', 'AuthController@signup');
    Route::post('login', 'AuthController@login');
});
