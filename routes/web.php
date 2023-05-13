<?php

use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntregasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MotoqueirosController;
use App\Http\Controllers\RegistroController;

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

##Entregas
Route::get('/entrega', [EntregasController::class, 'index']);

Route::post('/entrega', [EntregasController::class, 'create']);
Route::get('/entrega/all', [EntregasController::class, 'read']);

Route::get('entrega/edit/{id}', [EntregasController::class, 'edit']);
Route::put('entrega/update/{id}', [EntregasController::class, 'update']);


##Clientes
Route::get('/cliente', [ClientesController::class, 'index']);
Route::post('/cliente', [ClientesController::class, 'create']);

Route::get('/cliente/edit/{id}', [ClientesController::class, 'edit']);
Route::put('/cliente/update/{id}', [ClientesController::class, 'update']);

##Motoqueiros
Route::get('/motoqueiro', [MotoqueirosController::class, 'index']);
Route::post('/motoqueiro', [MotoqueirosController::class, 'create']);

Route::get('/motoqueiro/edit/{id}', [MotoqueirosController::class, 'edit']);
Route::put('/motoqueiro/update/{id}', [MotoqueirosController::class, 'update']);

##Login
Route::get('/login', [LoginController::class, 'loginForm']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', function(){
    return view('home');
});

##Registro
Route::get('/registro', [RegistroController::class, 'registroForm']);
Route::post('/registro', [RegistroController::class, 'registro']);

#Login
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware(['web', 'auth'])->group(function () {
    
    
});