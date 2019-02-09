<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('usuarios_acme', 'UsuariosAcmeController');
Route::resource('vehiculos', 'VehiculosController');

Route::get('informe_vehiculos', 'VehiculosController@pdf')->name('informe_vehiculos.pdf');
