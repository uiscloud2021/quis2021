<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ProfileController;
//EMPRESAS
use App\Http\Controllers\EmpresaController;

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


Route::get('/dashboard', 'App\Http\Controllers\DashController@index')->name('dashboard');

// Recursos de Empresa
Route::resource('empresas', EmpresaController::class);
Route::post('/empresas/created_socios', 'App\Http\Controllers\EmpresaController@created_socios')->name('empresas.created_socios');