<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/usuario/{param}', function () {
    return view("UsuarioList");
});

controller
app/http/controller

model
app/http/Models

View
resources/views/nome_arquivo.blade.php

rotas
routes/web.php
*/
Route::get('/usuario', [UsuarioController::class, 'index']);
Route::get('/usuario/create', [UsuarioController::class, 'create']);
Route::post('/usuario/store', [UsuarioController::class, 'store']);
Route::get('/usuario/edit/{id}', [UsuarioController::class, 'edit']);
Route::post('/usuario/update/{id}', [UsuarioController::class, 'update']);
Route::get('/usuario/destroy/{id}', [UsuarioController::class, 'destroy']);
