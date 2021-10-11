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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Em
// app/Providers/RouteServiceProvider.php
// Descomentando lá a linha abaixo não precisa colocar o Namespace inteiro dos Controllers
// protected $namespace = 'App\\Http\\Controllers'; (não descomente aqui.. é no RouteServiceProvider )


Route::prefix('v1')->middleware('jwt.auth')->group(function(){
    Route::apiResource('user', 'App\Http\Controllers\UserController');
    Route::apiResource('cliente', 'App\Http\Controllers\ClienteController');
    Route::apiResource('carro', 'App\Http\Controllers\CarroController');
    Route::apiResource('locacao', 'App\Http\Controllers\LocacaoController');
    Route::apiResource('marca', 'App\Http\Controllers\MarcaController');
    Route::apiResource('modelo', 'App\Http\Controllers\ModeloController');
});


// Sem Token
// Route::prefix('v1')->group(function(){
// Route::apiResource('user', 'App\Http\Controllers\UserController');
// Route::apiResource('cliente', 'App\Http\Controllers\ClienteController');
// Route::apiResource('carro', 'App\Http\Controllers\CarroController');
// Route::apiResource('locacao', 'App\Http\Controllers\LocacaoController');
// Route::apiResource('marca', 'App\Http\Controllers\MarcaController');
// Route::apiResource('modelo', 'App\Http\Controllers\ModeloController');
// });

Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::post('logout', 'App\Http\Controllers\AuthController@logout');
Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
Route::post('me', 'App\Http\Controllers\AuthController@me');
