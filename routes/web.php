<?php

use App\Http\Controllers\Admin\Admin_User_Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProdutoController;
use App\Http\Controllers\User\ContatoController;
use App\Http\Controllers\User\User_ProdutoController;
use App\Http\Controllers\User\UserController;
use App\Models\Categoria;
use App\Models\Contato;
use App\Http\Controllers\admin\Admin_Contato_Controller;
use App\Http\Controllers\Admin\AdminAuthController;
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

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('admin.auth')->group(function () {
    Route::get('/', fn() => view('admin.home.index'));
    
    Route::prefix('categoria')->group(function () {
        Route::get('/', [CategoriaController::class, 'index'])->name('admin.categoria.index');
        Route::get('/create', [CategoriaController::class, 'create'])->name('admin.categoria.create');
        Route::get('/edit/{id}', [CategoriaController::class, 'edit']);
        Route::post('/criar-categoria',[CategoriaController::class, 'store']);
        Route::put('/editar/{id}', [CategoriaController::class, 'update'])->name('admin.categoria.update');
        Route::delete('/{id}', [CategoriaController::class, 'destroy'])->name('admin.categoria.destroy');

        
    });
    Route::prefix('produto')->group(function () {
        Route::get('/', [ProdutoController::class, 'index'])->name('admin.produto.index');
        Route::get('/create', [ProdutoController::class, 'create'])->name('admin.produto.create');
        Route::get('/edit/{id}', [ProdutoController::class, 'edit'])->name(('admin.produto.edit'));
        Route::post('/criar-produto',[ProdutoController::class, 'store']);
        Route::put('/editar-produto/{id}',[ProdutoController::class, 'update'])->name('admin.produto.update');
        Route::delete('/admin/produto/{id}', [ProdutoController::class, 'destroy'])->name('admin.produto.destroy');
    });
    Route::prefix('user')->group(function () {
        Route::get('/', [Admin_User_Controller::class, 'index'])->name('admin.user.index');
        Route::get('/edit/{id}', [Admin_User_Controller::class, 'edit']);
    });
    
    Route::get('/contato', [Admin_Contato_Controller::class, 'index'])->name('admin.contato.index');
    
    
});

Route::prefix('')->group(function () {
    Route::get('/', fn() => view('site.home'));
    Route::get('produto/{id}', [User_ProdutoController::class, 'show'])->name('site.produto.show');
    Route::get('produtos', [User_ProdutoController::class, 'index'])->name('site.produtos');
    Route::get('contato',[ContatoController::class,'create'])->name('contato.create');
    Route::post('/criar-contato', [ContatoController::class, 'store'])->name('contato.store');

    Route::get('/cadastro', [UserController::class, 'create'])->name('usuario.create');
    Route::post('/cadastro', [UserController::class, 'store'])->name('usuario.store');
});

