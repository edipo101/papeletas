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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'configuracion'], function(){
	// Rutas para el modulo de empresa
	Route::get('empresas', 'EmpresaController@index')->name('empresas.index')->middleware('permission:empresas.index');
	Route::post('empresas/store', 'EmpresaController@store')->name('empresas.store')->middleware('permission:empresas.index');
  	Route::post('empresas/{empresa}/upload','EmpresaController@upload')->name('empresas.upload')->middleware('permission:empresas.index');
});

Route::group(['prefix' => 'administracion'], function(){
	// Rutas para el modulo de usuarios
	Route::get('users', 'UserController@index')->name('users.index')->middleware('permission:users.index');
	Route::get('users/create', 'UserController@create')->name('users.create')->middleware('permission:users.create');
	Route::post('users/store', 'UserController@store')->name('users.store')->middleware('permission:users.create');
	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');
	Route::put('users/{user}', 'UserController@update')->name('users.update')->middleware('permission:users.edit');
	Route::delete('users/{user}/delete', 'UserController@destroy')->name('users.destroy')->middleware('permission:users.destroy');

	// Rutas para el modulo de roles
	Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles.index');
	Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
	Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');
	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');
	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
	Route::delete('roles/{role}/delete', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');
});


// Rutas para el modulo de Modalidad
Route::get('modalidads', 'ModalidadController@index')->name('modalidads.index')->middleware('permission:modalidads.index');
Route::get('modalidads/create', 'ModalidadController@create')->name('modalidads.create')->middleware('permission:modalidads.create');
Route::post('modalidads/store', 'ModalidadController@store')->name('modalidads.store')->middleware('permission:modalidads.create');
Route::get('modalidads/{modalidad}/edit', 'ModalidadController@edit')->name('modalidads.edit')->middleware('permission:modalidads.edit');
Route::put('modalidads/{modalidad}', 'ModalidadController@update')->name('modalidads.update')->middleware('permission:modalidads.edit');
Route::delete('modalidads/{modalidad}/delete', 'ModalidadController@destroy')->name('modalidads.destroy')->middleware('permission:modalidads.destroy');

// Rutas para el modulo de Funcionario
Route::get('funcionarios', 'FuncionarioController@index')->name('funcionarios.index')->middleware('permission:funcionarios.index');
Route::get('funcionarios/create', 'FuncionarioController@create')->name('funcionarios.create')->middleware('permission:funcionarios.create');
Route::post('funcionarios/store', 'FuncionarioController@store')->name('funcionarios.store')->middleware('permission:funcionarios.create');
Route::get('funcionarios/{funcionario}/edit', 'FuncionarioController@edit')->name('funcionarios.edit')->middleware('permission:funcionarios.edit');
Route::put('funcionarios/{funcionario}', 'FuncionarioController@update')->name('funcionarios.update')->middleware('permission:funcionarios.edit');
Route::delete('funcionarios/{funcionario}/delete', 'FuncionarioController@destroy')->name('funcionarios.destroy')->middleware('permission:funcionarios.destroy');

// Rutas para el modulo de Planilla
Route::get('planillas', 'PlanillaController@index')->name('planillas.index')->middleware('permission:planillas.index');
Route::get('planillas/create', 'PlanillaController@create')->name('planillas.create')->middleware('permission:planillas.create');
Route::post('planillas/store', 'PlanillaController@store')->name('planillas.store')->middleware('permission:planillas.create');
Route::get('planillas/{planilla}/edit', 'PlanillaController@edit')->name('planillas.edit')->middleware('permission:planillas.edit');
Route::put('planillas/{planilla}', 'PlanillaController@update')->name('planillas.update')->middleware('permission:planillas.edit');
Route::delete('planillas/{planilla}/delete', 'PlanillaController@destroy')->name('planillas.destroy')->middleware('permission:planillas.destroy');
Route::get('planillas/{planilla}/listar', 'PlanillaController@listar')->name('planillas.listar')->middleware('permission:planillas.listado');

Route::get('planillas/{planilla}/generar', 'PlanillaController@generar')->name('planillas.papeletas')->middleware('permission:planillas.papeletas');

// Rutas para el modulo de Papeleta
Route::get('papeletas/{id}', 'PapeletaController@index')->name('papeletas.index')->middleware('permission:papeletas.index');
Route::get('papeletas/{id}/create', 'PapeletaController@create')->name('papeletas.create')->middleware('permission:papeletas.create');
Route::post('papeletas/{id}/store', 'PapeletaController@store')->name('papeletas.store')->middleware('permission:papeletas.create');
Route::get('papeletas/{id}/{papeleta}/edit', 'PapeletaController@edit')->name('papeletas.edit')->middleware('permission:papeletas.edit');
Route::put('papeletas/{papeleta}', 'PapeletaController@update')->name('papeletas.update')->middleware('permission:papeletas.edit');
Route::delete('papeletas/{papeleta}/delete', 'PapeletaController@destroy')->name('papeletas.destroy')->middleware('permission:papeletas.destroy');
Route::get('papeletas/{id}/imprimir', 'PapeletaController@imprimir')->name('papeletas.imprimir')->middleware('permission:papeletas.imprimir');
Route::post('papeletas/importar', 'PapeletaController@importar')->name('papeletas.importar')->middleware('permission:papeletas.importar');

// Rutas para cambiar el password del usuario
Route::get('/perfil','UserController@perfil')->name('users.perfil')->middleware('permission:users.perfil');
Route::put('users/{user}/password','UserController@updatepassword')->name('users.updatepassword')->middleware('permission:users.perfil');

// Rutas para las api para los datatables
Route::get('api/users','UserController@apiUsers')->name('users.apiUsers')->middleware('permission:users.index');
Route::get('api/roles','RoleController@apiRoles')->name('roles.apiRoles')->middleware('permission:roles.index');

Route::get('api/modalidads','ModalidadController@apiModalidads')->name('modalidads.apiModalidads')->middleware('permission:modalidads.index');
Route::get('api/funcionarios','FuncionarioController@apiFuncionarios')->name('funcionarios.apiFuncionarios')->middleware('permission:funcionarios.index');
Route::get('api/planillas','PlanillaController@apiPlanillas')->name('planillas.apiPlanillas')->middleware('permission:planillas.index');

Route::get('api/papeletas/{id}','PapeletaController@apiPapeletas')->name('papeletas.apiPapeletas')->middleware('permission:papeletas.index');