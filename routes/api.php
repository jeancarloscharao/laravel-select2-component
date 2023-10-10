<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Select2Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/teste/{id?}', [Select2Controller::class, 'getOptions']);

Route::get('/estados/{id?}', [Select2Controller::class, 'getOptionsEstados']);
Route::get('/cidades/{id?}', [Select2Controller::class, 'getOptionsCidades']);
Route::get('/bairros/{id?}', [Select2Controller::class, 'getOptionsBairros']);
