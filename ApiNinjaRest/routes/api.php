<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NinjasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\MisionesController;

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

Route::apiResource("ninjas",NinjasController::class);

Route::apiResource("clientes",ClientesController::class);

Route::apiResource("misiones",MisionesController::class);
