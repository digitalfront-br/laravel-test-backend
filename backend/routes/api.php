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

Route::post('auth/login', 'Api\\AuthController@login');


Route::apiResource('imovel', 'ImovelController')->names('imovel');
Route::apiResource('estados', 'EstadoController')->names('estado');
// Route::apiResource('imovel', 'ImovelController', ['middleware' => ['apiJwt']])->names('imovel');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
