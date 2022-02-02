<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCursosController;
use App\Http\Controllers\BecariosController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\ComprobantePagoController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\TicketSinFichaController;
use App\Http\Controllers\VerCursosController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EditarPerfilController;
use App\Http\Controllers\CartCursosController;
use App\Http\Controllers\TicketItemController;
use App\Http\Controllers\FichasController;
use App\Http\Controllers\FichasMontoController;
use App\Http\Controllers\ImportFichaController;
use App\Http\Controllers\AdminComprobantesController;





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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users/becarios', [App\Http\Controllers\AdminUserController::class, 'becarios'])->name('users.becarios')->middleware('admin');
Route::get('/admins', [App\Http\Controllers\AdminUserController::class, 'admins'])->name('admins')->middleware('admin');
Route::get('/unam', [App\Http\Controllers\AdminUserController::class, 'unam'])->name('unam')->middleware('admin');
Route::get('/nounam', [App\Http\Controllers\AdminUserController::class, 'nounam'])->name('nounam')->middleware('admin');
Route::get('/publicogeneral', [App\Http\Controllers\AdminUserController::class, 'publicogeneral'])->name('publicogeneral')->middleware('admin');



Route::get('/inscripcion', [App\Http\Controllers\HomeController::class, 'inscripcion'])->name('inscripcion');


Route::get('/admins/tickets/sin-aprobar', [App\Http\Controllers\AdminTicketController::class, 'sinaprobar'])->name('sinaprobar')->middleware('admin');
Route::get('/admins/tickets/pagados', [App\Http\Controllers\AdminTicketController::class, 'pagados'])->name('pagados')->middleware('admin');
Route::get('/admins/tickets/sinficha', [App\Http\Controllers\AdminTicketController::class, 'sinficha'])->name('sinficha')->middleware('admin');
Route::get('/admins/tickets/pendiente-pago', [App\Http\Controllers\AdminTicketController::class, 'pendientepago'])->name('pendientepago')->middleware('admin');



Route::resource('admin', AdminUserController::class)->middleware('admin');
Route::resource('admincursos', AdminCursosController::class)->middleware('admin');

Route::resource('cursos', CursoController::class);
Route::resource('becarios', BecariosController::class);
Route::resource('ticket', TicketController::class);
Route::resource('ticketsficha', TicketSinFichaController::class);

Route::resource('perfil', PerfilController::class);
Route::resource('comprobante', ComprobanteController::class);

Route::resource('admintickets', AdminTicketController::class)->middleware('admin');

Route::resource('ver-cursos', VerCursosController::class);

Route::resource('estudiante', EstudianteController::class);
Route::resource('cart', CartController::class);
Route::resource('adminfichas', FichasController::class)->middleware('admin');

Route::resource('editar-perfil', EditarPerfilController::class);
Route::resource('cart-cursos', CartCursosController::class);

Route::resource('ticket-item', TicketItemController::class);
Route::resource('admincomprobantes', AdminComprobantesController::class)->middleware('admin');

Route::get('/admins/comprobantes/comprobanteappbbva', [App\Http\Controllers\AdminComprobantesController::class, 'comprobanteappbbva'])->name('comprobanteappbbva')->middleware('admin');
Route::get('/admins/comprobantes/comprobanteotrobanco', [App\Http\Controllers\AdminComprobantesController::class, 'comprobanteotrobanco'])->name('comprobanteotrobanco')->middleware('admin');



Route::get('/admins/fichas/quinientos', [App\Http\Controllers\FichasMontoController::class, 'quinientos'])->name('quinientos')->middleware('admin');
Route::get('/admins/fichas/mil', [App\Http\Controllers\FichasMontoController::class, 'mil'])->name('mil')->middleware('admin');
Route::get('/admins/fichas/seiscientos', [App\Http\Controllers\FichasMontoController::class, 'seiscientos'])->name('seiscientos')->middleware('admin');
Route::get('/admins/fichas/mildoscientos', [App\Http\Controllers\FichasMontoController::class, 'mildoscientos'])->name('mildoscientos')->middleware('admin');
Route::get('/admins/fichas/setescientos', [App\Http\Controllers\FichasMontoController::class, 'setescientos'])->name('setescientos')->middleware('admin');
Route::get('/admins/fichas/milcuatroscientos', [App\Http\Controllers\FichasMontoController::class, 'milcuatroscientos'])->name('milcuatroscientos')->middleware('admin');







Route::get('/depositobbva/{fichaid}/{ticketid}', [App\Http\Controllers\ComprobantePagoController::class, 'depositobbva']);
Route::get('/appbbva/{fichaid}/{ticketid}', [App\Http\Controllers\ComprobantePagoController::class, 'appbbva']);
Route::get('/otrobanco/{fichaid}/{ticketid}', [App\Http\Controllers\ComprobantePagoController::class, 'otrobanco']);






Route::get('/cursos/inters', [App\Http\Controllers\CursoController::class, 'inters'])->name('cursos.inters');
Route::get('/cursos/semestrales', [App\Http\Controllers\CursoController::class, 'semestrales'])->name('semestrales');


Route::get('file-import-export', [ImportFichaController::class, 'fileImportExport']);
Route::post('file-import', [ImportFichaController::class, 'importExcel'])->name('file-import');
Route::get('file-export', [ImportFichaController::class, 'fileExport'])->name('file-export');



