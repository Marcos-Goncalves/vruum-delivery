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

Route::get('/entrega', function() {
    return view ('entrega');
});

Route::post('/entrega', [EntregasController::class, 'create']);

Route::get('/', function () {
    return view('welcome');
});
