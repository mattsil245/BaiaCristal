<?php

use App\Http\Controllers\Admin\Admin_User_Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProdutoController;
use App\Http\Controllers\User\ContatoController;
use App\Http\Controllers\User\User_ProdutoController;
use App\Models\Categoria;
use App\Models\Produto;
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

Route::prefix('admin')->group(function (){
    Route::get('/', fn() => view('admin.home.index'));
    
    Route::prefix('categoria')->group(function () {
        Route::get('/', [CategoriaController::class, 'index'])->name('admin.categoria.index');
        Route::get('/create', [CategoriaController::class, 'create'])->name('admin.categoria.create');
        Route::get('/edit/{id}', [CategoriaController::class, 'edit']);
        Route::post('/criar-categoria',[CategoriaController::class, 'store']);
    });
    Route::prefix('produto')->group(function () {
        Route::get('/', [ProdutoController::class, 'index'])->name('admin.produto.index');
        Route::get('/create', [ProdutoController::class, 'create'])->name('admin.produto.create');
        Route::get('/edit/{id}', [ProdutoController::class, 'edit'])->name(('admin.produto.edit'));
        Route::post('/criar-produto',[ProdutoController::class, 'store']);
    });
    Route::prefix('user')->group(function () {
        Route::get('/', [Admin_User_Controller::class, 'index'])->name('admin.user.index');
        Route::get('/edit/{id}', [Admin_User_Controller::class, 'edit']);
    });
    Route::get('/contato', fn() => view('admin.contato.index'));
});

Route::prefix('')->group(function () {
    Route::get('/', fn() => view('site.home'));
    Route::get('produto', fn() => view('site.produto'));
    Route::get('produtos', fn() => view('site.produtos'));
     Route::get('cadastro', fn() => view('site.cadastro'));
     Route::get('login', fn() => view('site.login'));
    Route::get('contato',[ContatoController::class,'create'])->name('contato.create');
});

