<?php

use App\Http\Controllers\Admin\ProdutoController;
use App\Http\Controllers\Aula\BeerController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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


Route::group(['middleware' => 'auth'], function () {

    Route::get("produto", [ProdutoController::class, "index"])->name("produto.index");
    Route::get("categoria", [\App\Http\Controllers\Admin\CategoriaController::class, "index"])->name("categoria.index");
    Route::get("ingrediente", [\App\Http\Controllers\Admin\IngredienteController::class, "index"])->name("ingrediente.index");
    Route::get("produto/ingredientes", [ProdutoController::class, "ingrediente"])->name("produto.ingrediente");
    Route::get("produto/categorias", [ProdutoController::class, "categoria"])->name("produto.categoria");


    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');


    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

    Route::get('/beers', [BeerController::class, 'index']);

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
