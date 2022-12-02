<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CustomController;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::controller(CustomController::class)->group(function(){
    Route::get('/', 'index')->name('login');
    Route::get('login', 'index')->name('login');
    Route::get('registration', 'registration')->name('registration');
    Route::get('logout', 'logout')->name('logout');
    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');
    Route::post('validate_login', 'validate_login')->name('sample.validate_login');
});

Route::controller(ClienteController::class)->group(function(){
    Route::get('/cliente/create', 'create')->name('create');
    Route::post('/cliente/createCliente', 'createCliente')->name('createCliente'); //url - nome do metodo - nome da rota
    Route::get('/cliente/read/{id}', 'read')->name('read');
    Route::post('/cliente/update/{id}', 'update')->name('update');
    Route::post('/cliente/delete/{id}', 'delete')->name('delete');
});

/*

Route::get('/cliente/create', [ClienteController::class, 'create']);
Route::get('/cliente/read', [ClienteController::class, 'read']);
Route::get('/cliente/read', [ClienteController::class, 'all']);
Route::get('/cliente/update', [ClienteController::class, 'update']);
Route::get('/cliente/delete', [ClienteController::class, 'delete']);

*/