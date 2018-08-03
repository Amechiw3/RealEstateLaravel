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

Route::get('/', 'WelcomeController@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Logout', 'UsuariosController@getLogout');

Route::resource('/Ciudades', 'CiudadesController');
Route::get('/dropdownCiudades', function(){
    $input = Input::get('option');
	$estados = \realestate\Estado::find($input);
    $models = $estados->Ciudades();
	return Response::make($models->get(['ciudadid', 'ciudad']));
});
Route::resource('/Documentos', 'DocumentosController');
Route::resource('/DocumentosEntregados', 'DocumentosEntregadosController');
Route::resource('/Estados', 'EstadosController');
Route::get('/dropdownEstados', function(){
    $input = Input::get('option');
	$estados = \realestate\Pais::find($input);
    $models = $estados->estados();
	return Response::make($models->get(['estadoid', 'estado']));
});
Route::resource('/Movimientos', 'MovimientosController');
Route::resource('/Paises', 'PaisesController');
Route::resource('/Permisos', 'PermisosController');
Route::resource('/PermisosNegados', 'PermisosNegadosController');
Route::resource('/Propiedades', 'PropiedadesController');
Route::resource('/PropiedadesImagenes', 'PropiedadesImagenesController');
Route::resource('/PropiedadesResumenes', 'PropiedadesResumenesController');
Route::resource('/Reservas', 'ReservasController');
Route::resource('/TiposPropiedades', 'TiposPropiedadesController');
Route::resource('/TiposUsuarios', 'TiposUsuariosController');
Route::resource('/Usuarios', 'UsuariosController');