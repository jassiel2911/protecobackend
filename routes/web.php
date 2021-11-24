<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCursosController;
use App\Http\Controllers\BecariosController;
use App\Http\Controllers\CursoController;




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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/becarios', [App\Http\Controllers\AdminUserController::class, 'becarios'])->name('becarios');
Route::get('/admins', [App\Http\Controllers\AdminUserController::class, 'admins'])->name('admins');



Route::resource('admin', AdminUserController::class);
Route::resource('admincursos', AdminCursosController::class);

Route::resource('cursos', CursoController::class);
Route::get('/cursos/inters', [App\Http\Controllers\CursoController::class, 'inters'])->name('cursos.inters');
Route::get('/cursos/semestrales', [App\Http\Controllers\CursoController::class, 'semestrales'])->name('semestrales');




