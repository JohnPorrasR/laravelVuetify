<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('home', 'HomeController');

Route::resource('actividad', 'Maestros\ActividadController');
Route::resource('cargo', 'Maestros\CargoController');
Route::resource('entidad', 'Maestros\EntidadController');
Route::resource('modulo', 'Maestros\ModuloController');
Route::resource('oficina', 'Maestros\OficinaController');
Route::resource('tablas', 'Maestros\PartablaController');
Route::resource('perfil', 'Maestros\PerfilController');
Route::resource('permiso_base', 'Maestros\PermisoBaseController');
Route::resource('permiso', 'Maestros\PermisoController');
Route::resource('persona', 'Maestros\PersonaController');




