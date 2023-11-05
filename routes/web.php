<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Requests\Request;

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\ProdukController::class, 'show'])->name('home');

Route::get('/admin', function () {
    return view('admin.index');
});

//Admin - Brand
Route::resource('admin/brands', BrandController::class);
Route::resource('admin/kategoris', KategoriController::class);
Route::resource('admin/produks', ProdukController::class);

//Login
Auth::routes();
Route::post('login', [LoginController::class, 'authenticate'])->name('loginUI');
Route::get('login', [LoginController::class, 'showLoginUI'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');