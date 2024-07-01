<?php

use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/index', function(){
    return view('index');
})->name('index');

Route::post('/registro', [UserController::class, 'save'])->name('registro.salvar');

Route::post('/logar', [UserController::class, 'logar'])->name('registro.logar');

Route::get('/getItens', [ProductController::class, 'getItens'])->name('itens');

Route::get('/usuarios', [UserController::class, 'usuarios'])->name('usuarios');

Route::post('/compras/{usuario}/{idProduto}', [ComprasController::class, 'inserirCompra'])->name('compras.inserir');

Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');

Route::get('/compras/{id}/edit', [ComprasController::class, 'edit'])->name('compras.edit');

Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

Route::put('/compras/{id}', [ComprasController::class, 'update'])->name('compras.update');

Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/compras', [ComprasController::class, 'todasCompras'])->name('compras');

Route::get('/compras/{id}/show', [ComprasController::class, 'minhasCompras'])->name('compras_user');


