<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
//EMPRESAS
use App\Http\Controllers\EmpresaController;
//PROYECTOS
use App\Http\Controllers\Administracion\ProyectoController;
//INVENTARIO
use App\Http\Controllers\Administracion\InventarioController;

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

Route::resource('users', UserController::class);

Route::resource('roles', RoleController::class);

Route::resource('permissions', PermissionController::class);

Route::resource('home', InicioController::class);

Route::resource('dashboard', DashController::class);

Route::resource('profile', ProfileController::class);

Route::resource('menus', MenuController::class);

Route::resource('submenus', SubmenuController::class);


Route::get('/dashboard', 'App\Http\Controllers\DashController@index')->name('dashboard');

//RECURSOS EMPRESA
Route::resource('empresas', EmpresaController::class);
//MODAL SOCIOS EMPRESA
Route::post('/empresas/guardar_empresa', 'App\Http\Controllers\EmpresaController@guardar_empresa')->name('empresas.guardar_empresa');
Route::post('/empresas/list_socios', 'App\Http\Controllers\EmpresaController@list_socios')->name('empresas.list_socios');
Route::post('/empresas/create_socios', 'App\Http\Controllers\EmpresaController@create_socios')->name('empresas.create_socios');
Route::post('/empresas/edit_socios', 'App\Http\Controllers\EmpresaController@edit_socios')->name('empresas.edit_socios');
Route::post('/empresas/delete_socios', 'App\Http\Controllers\EmpresaController@delete_socios')->name('empresas.delete_socios');
//MODAL DOMICILIOS EMPRESA
Route::post('/empresas/list_domicilios', 'App\Http\Controllers\EmpresaController@list_domicilios')->name('empresas.list_domicilios');
Route::post('/empresas/create_domicilios', 'App\Http\Controllers\EmpresaController@create_domicilios')->name('empresas.create_domicilios');
Route::post('/empresas/edit_domicilios', 'App\Http\Controllers\EmpresaController@edit_domicilios')->name('empresas.edit_domicilios');
Route::post('/empresas/delete_domicilios', 'App\Http\Controllers\EmpresaController@delete_domicilios')->name('empresas.delete_domicilios');
//MODAL REPRESENTANTE LEGAL EMPRESA
Route::post('/empresas/list_legal', 'App\Http\Controllers\EmpresaController@list_legal')->name('empresas.list_legal');
Route::post('/empresas/create_legal', 'App\Http\Controllers\EmpresaController@create_legal')->name('empresas.create_legal');
Route::post('/empresas/edit_legal', 'App\Http\Controllers\EmpresaController@edit_legal')->name('empresas.edit_legal');
Route::post('/empresas/delete_legal', 'App\Http\Controllers\EmpresaController@delete_legal')->name('empresas.delete_legal');
//MODAL DOCUMENTOS REGULATORIOS EMPRESA
Route::post('/empresas/list_documentos', 'App\Http\Controllers\EmpresaController@list_documentos')->name('empresas.list_documentos');
Route::post('/empresas/create_documentos', 'App\Http\Controllers\EmpresaController@create_documentos')->name('empresas.create_documentos');
Route::post('/empresas/edit_documentos', 'App\Http\Controllers\EmpresaController@edit_documentos')->name('empresas.edit_documentos');
Route::post('/empresas/delete_documentos', 'App\Http\Controllers\EmpresaController@delete_documentos')->name('empresas.delete_documentos');
//MODAL RESPONSABILIDADES EMPRESA
Route::post('/empresas/list_responsabilidades', 'App\Http\Controllers\EmpresaController@list_responsabilidades')->name('empresas.list_responsabilidades');
Route::post('/empresas/create_responsabilidades', 'App\Http\Controllers\EmpresaController@create_responsabilidades')->name('empresas.create_responsabilidades');
Route::post('/empresas/edit_responsabilidades', 'App\Http\Controllers\EmpresaController@edit_responsabilidades')->name('empresas.edit_responsabilidades');
Route::post('/empresas/delete_responsabilidades', 'App\Http\Controllers\EmpresaController@delete_responsabilidades')->name('empresas.delete_responsabilidades');
//MODAL SANITARIO EMPRESA
Route::post('/empresas/list_sanitario', 'App\Http\Controllers\EmpresaController@list_sanitario')->name('empresas.list_sanitario');
Route::post('/empresas/create_sanitario', 'App\Http\Controllers\EmpresaController@create_sanitario')->name('empresas.create_sanitario');
Route::post('/empresas/edit_sanitario', 'App\Http\Controllers\EmpresaController@edit_sanitario')->name('empresas.edit_sanitario');
Route::post('/empresas/delete_sanitario', 'App\Http\Controllers\EmpresaController@delete_sanitario')->name('empresas.delete_sanitario');
//MODAL CUENTAS EMPRESA
Route::post('/empresas/list_cuentas', 'App\Http\Controllers\EmpresaController@list_cuentas')->name('empresas.list_cuentas');
Route::post('/empresas/create_cuentas', 'App\Http\Controllers\EmpresaController@create_cuentas')->name('empresas.create_cuentas');
Route::post('/empresas/edit_cuentas', 'App\Http\Controllers\EmpresaController@edit_cuentas')->name('empresas.edit_cuentas');
Route::post('/empresas/delete_cuentas', 'App\Http\Controllers\EmpresaController@delete_cuentas')->name('empresas.delete_cuentas');
//MODAL PROPIEDAD EMPRESA
Route::post('/empresas/list_propiedad', 'App\Http\Controllers\EmpresaController@list_propiedad')->name('empresas.list_propiedad');
Route::post('/empresas/create_propiedad', 'App\Http\Controllers\EmpresaController@create_propiedad')->name('empresas.create_propiedad');
Route::post('/empresas/edit_propiedad', 'App\Http\Controllers\EmpresaController@edit_propiedad')->name('empresas.edit_propiedad');
Route::post('/empresas/delete_propiedad', 'App\Http\Controllers\EmpresaController@delete_propiedad')->name('empresas.delete_propiedad');
//MODAL VINCULACION EMPRESA
Route::post('/empresas/list_vinculacion', 'App\Http\Controllers\EmpresaController@list_vinculacion')->name('empresas.list_vinculacion');
Route::post('/empresas/create_vinculacion', 'App\Http\Controllers\EmpresaController@create_vinculacion')->name('empresas.create_vinculacion');
Route::post('/empresas/edit_vinculacion', 'App\Http\Controllers\EmpresaController@edit_vinculacion')->name('empresas.edit_vinculacion');
Route::post('/empresas/delete_vinculacion', 'App\Http\Controllers\EmpresaController@delete_vinculacion')->name('empresas.delete_vinculacion');

//RECURSOS PROYECTOS
Route::resource('proyectos', ProyectoController::class);
Route::post('/proyectos/cargar_investigador', 'App\Http\Controllers\Administracion\ProyectoController@cargar_investigador')->name('proyectos.cargar_investigador');
//RECURSOS INVENTARIO
Route::resource('inventario', InventarioController::class);