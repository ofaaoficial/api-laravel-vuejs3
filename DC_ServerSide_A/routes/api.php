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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('registro', 'UsuarioController@Registro');
Route::post('login', 'UsuarioController@Login');

    Route::get('logout', 'UsuarioController@Logout');
    Route::APIresource('regiones', 'RegionController');
    Route::APIresource('platos', 'PlatoController');


