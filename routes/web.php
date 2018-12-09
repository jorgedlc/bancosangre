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


/*
Route::get('/inicio', function () {
    return View('pages.inicio');
});
*/

Route::get('/asignacion',function(){
    return View('pages.asignacion_citas');
});

Route::get('/confirmacion',function(){
    return View('pages.confirmacion_citas');
});

Route::get('/cupos',function(){
    return View('pages.cupos');
});

Route::get('/reportes',function(){
    return View('pages.reportes');
});

Route::get('/login',function(){
    return view('login');
});

Route::get('/template',function(){
    return View('pages.templatecitas');
});



/*

Route::get('/horarios',function(){
    return view('pages.cuposdias');
});
*/

#Rutas AJAX -> Controladores


Route::post('/ingresarUsuario', 'usuariosController@create');
Route::post('/obtenerUsuario', 'usuariosController@show');
Route::post('/editarUsuario','usuariosController@update');
Route::post('/consultarFechasCalendario','CuposController@consultarFechasCalendario');
Route::post('/crearCitas','CitasController@crearCitas');
Route::post('/consultarHorarioEspecifico','HorariosController@consultarHorariosFechaEspecifica');
Route::get('/usuarios', 'usuariosController@index');
Route::get('/tiposusuarios', 'TipoUsuarioController@index');
Route::get('/horarios','HorariosController@index');
Route::post('/horariosed','HorariosController@update');
Route::get('/donantes','DonantesController@index');
Route::get('/pacientes','PacientesController@index');
Route::post('/ingresarDomingo','HorariosController@ingresarDomingo');

Route::get('/','CitasController@index');
Route::post('/confirmarCitas','CitasController@confirmarCitas');
Route::post('/consultarHorariosHabiles','CuposController@consultarHorariosHabiles');
Route::post('/asignarHorariosDefault','HorariosController@asignarHorariosDefault');
Route::post('/buscarDocumento','CitasController@buscarDocumento');