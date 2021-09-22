<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::resource('layouts/admin', 'menuController');
Route::get('/', 'menuController@index');

Route::resource('modelos/categoria', 'CategoriaController');
Route::resource('pedidos', 'PedidoController');

Route::resource('modelos/cliente', 'ClienteController');

Route::resource('productos', 'ProductoController');


Route::resource('modelos/Estado/Descuentos', 'EstadoDescuentoController');
Route::resource('modelos/Estado/Impuestos', 'EstadoImpuestoController');
Route::resource('modelos/descuentos', 'DescuentoController');
Route::resource('modelos/impuestos', 'ImpuestoController');

Route::resource('modelos/Tickets', 'TicketController');
Route::resource('auth/login', 'HomeController');


Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
