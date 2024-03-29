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

##Login
Route::get('/login', [LoginController::class, 'loginForm']);
Route::post('/login', [LoginController::class, 'login']);

// Route::group(['prefix' => 'motoqueiro'], function() {
//     Route::get('/login', [MotoqueirosController::class, 'loginForm']);
//     Route::post('/login', [MotoqueirosController::class, 'login'])->name('motoqueiro.login.form');
// });

// Route::group(['prefix' => 'usuario'], function() {
//     Route::get('/registro', [RegistroController::class, 'registroForm']);
//     Route::post('/register', [LoginController::class, 'register']);
//     Route::get('/login', [LoginController::class, 'loginForm']);
//     Route::post('/login', [LoginController::class, 'login'])->name('motoqueiro.login.form');
//     Route::post('/logout', [LoginController::class, 'logout']);
// });

Route::get('/home', [EntregasController::class, 'read']);

Route::get('/home/motociclista', [MotoqueirosController::class, 'home']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::put('/motoqueiro/{id}/status', [MotoqueirosController::class, 'updateStatus']);

Route::put('/home/motociclista/finalizar/{id}', [EntregasController::class, 'finalizarEntrega']);

// Route::middleware(['web', 'auth'])->group(function () {
    // Route::get('/home', function(){
    //     return view('home');
    // });

    ##Fila

    #Logout

    // Route::middleware(['checkSessionData'])->group(function () {
        ##Motoqueiros
        Route::get('/motoqueiro', [MotoqueirosController::class, 'index']);
        Route::post('/motoqueiro', [MotoqueirosController::class, 'create']);

        Route::get('/motoqueiro/edit/{id}', [MotoqueirosController::class, 'edit']);
        Route::put('/motoqueiro/update/{id}', [MotoqueirosController::class, 'update']);
        Route::get('/motoqueiro/read', [MotoqueirosController::class, 'read']);

        Route::get('/motoqueiro/list', [MotoqueirosController::class, 'listAll']);

        ##Clientes
        Route::get('/cliente/read', [ClientesController::class, 'read'])->name('cliente.read');
        Route::get('/cliente', [ClientesController::class, 'index']);
        Route::post('/cliente', [ClientesController::class, 'create']);

        Route::get('/cliente/edit/{id}', [ClientesController::class, 'edit']);
        Route::put('/cliente/update/{id}', [ClientesController::class, 'update']);

        Route::get('/cliente/list', [ClientesController::class, 'listAll']);

        ##Registro
        Route::get('/registro', [RegistroController::class, 'registroForm']);
        Route::post('/registro', [RegistroController::class, 'registro']);

        Route::get('/registro/edit/{id}', [RegistroController::class, 'edit']);
        Route::put('/registro/update/{id}', [RegistroController::class, 'update']);

        Route::get('/registro/list', [RegistroController::class, 'listAll']);

        ##Entregas
        Route::get('/entrega', [EntregasController::class, 'index'])->name('entrega');

        Route::post('/entrega', [EntregasController::class, 'create']);
        Route::get('/entrega/all', [EntregasController::class, 'read']);

        Route::get('entrega/edit/{id}', [EntregasController::class, 'edit'])->name('entrega.edit');
        Route::put('entrega/update/{id}', [EntregasController::class, 'update']);

        Route::get('/entrega/list', [EntregasController::class, 'listAll']);
    // });
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('checkUserRole:usuario');
    // Route::get('/home', function(){
    //     return view('home');
    // });
