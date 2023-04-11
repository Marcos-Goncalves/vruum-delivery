<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntregasController;

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

Route::get('/entrega', [EntregasController::class, 'index']);

Route::post('/entrega', [EntregasController::class, 'create']);
Route::get('/entrega/all', [EntregasController::class, 'read']);

Route::get('entrega/edit/{id}', [EntregasController::class, 'edit']);
Route::put('entrega/update/{id}', [EntregasController::class, 'update']);
