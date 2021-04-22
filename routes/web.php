<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/comercial', [App\Http\Controllers\ComercialController::class, 'index'])->name('comercial');
Route::post('/comercial-reporte', [App\Http\Controllers\ComercialController::class, 'reporte'])->name('reporte');

Route::get('/administracion', [App\Http\Controllers\HomeController::class, 'administracion'])->name('administracion');
Route::get('/historial', [App\Http\Controllers\HomeController::class, 'historial']);
Route::get('/promociones-usuarios', [App\Http\Controllers\ApiController::class ,'promociones_usuarios']);
Route::post('/reporte-export', [App\Http\Controllers\ComercialController::class, 'reporte_export']);
Route::resource('users', App\Http\Controllers\UserController::class);
