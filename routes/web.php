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
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::put('/desactivar_cuenta/{id}', 'CuentasController@desactivar_cuenta')->name('desactivar_cuenta')->middleware('auth');
    Route::resource('/cuentas', 'CuentasController');
    Route::resource('/movimientos', 'MovimientosController');
    Route::resource('/cajeros', 'CajerosController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/cuentasUser', 'MovimientosController@getCuentas');

    Route::get('/cuentasUserCajero', 'CajerosController@getCuentas');
    Route::get('/UserCajero', 'CajerosController@getUser');
});
Auth::routes();

