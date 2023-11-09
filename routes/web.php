<?php

use App\Models\Produk;
use App\Models\Kategori;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/', [HomeController::class,'showHome']);
Route::get('/',function(){
    return view('home',[
        'produk'=> Produk::all(),
        'kategoris'=>Kategori::all()
    ]);
});

Route::get('/product-detail', function () {
    return view('product.detail');
})->name('product.detail');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\ProdukController::class, 'show'])->name('home');

//User: Product
Route::get('/produk-detail/{produkId}', [App\Http\Controllers\ProdukController::class, 'produkDetail'])->name('produk-detail');

Route::get('/admin', function () {
    return view('admin.index');
});

//Admin - Brand
Route::resource('admin/brands', BrandController::class);
Route::resource('admin/kategoris', KategoriController::class);
Route::resource('admin/produks', ProdukController::class);
Route::resource('admin/admins', AdminController::class);

//Login
Auth::routes();
Route::post('login', [LoginController::class, 'authenticate'])->name('loginUI');
Route::get('login', [LoginController::class, 'showLoginUI'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


//User
Route::get('/favorit/{produkId}', [UserController::class, 'addOrDeleteFavorite'])->name('favorit');

Route::get('/favorit-page', function () {
    return view('favorit');
})->name('favorite.page');
