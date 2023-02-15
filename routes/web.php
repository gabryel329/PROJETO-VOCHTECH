<?php

use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\UnidadeController;
use App\Mail\FuncionarioCriado;
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

#ROTAS UNIDADES
Route::put('/unidade/{id}', [UnidadeController::class, 'update'])->name('unidade.update');
Route::get('/unidade/{id}/edit', [UnidadeController::class, 'edit'])->name('unidade.edit');
Route::delete('/unidade/{id}', [UnidadeController::class, 'destroy'])->name('unidade.delete');
Route::get('/unidade', [UnidadeController::class, 'index'])->name('unidade.index');
Route::get('/unidade/create', [UnidadeController::class, 'create'])->name('unidade.create');
Route::post('/unidade', [UnidadeController::class, 'store'])->name('unidade.store');
Route::get('/unidade/{id}', [UnidadeController::class, 'show'])->name('unidade.show');

#ROTAS FUNCIONARIOS
Route::controller(FuncionariosController::class)->group(function (){
    Route::put('/funcionario/{id}', 'update')->name('funcionario.update');
    Route::get('/funcionario/{id}/edit', 'edit')->name('funcionario.edit');
    Route::delete('/funcionario/{id}', 'destroy')->name('funcionario.delete');
    Route::get('/', 'index')->name('funcionario.index');
    Route::get('/funcionario/create', 'create')->name('funcionario.create');
    Route::post('/funcionario', 'store')->name('funcionario.store');
    Route::get('/funcionario/{id}', 'show')->name('funcionario.show');
});

#ROTAS EMAIL
Route::get('/email', function(){
    return new FuncionarioCriado();
});
