<?php

use App\Models\Produk;
use App\Models\Kategori;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\GambarController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DiskonProdukController;
use App\Http\Controllers\JenisPengirimanController;
use App\Http\Controllers\PelangganProdukController;
use App\Http\Controllers\AlamatPengirimanController;
use App\Http\Controllers\MetodePembayaranController;

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
Route::get('/produk-detail/{produkId}', [PelangganProdukController::class, 'produkDetail'])->name('produk-detail');


//Admin thigs
Route::prefix('admin')->group(function () {
    Route::middleware('isadmin')->group(function(){
        Route::get('/', function () {
            return view('admin.index');
        });
        Route::resource('brands', BrandController::class);
        Route::resource('kategoris', KategoriController::class);
        Route::resource('produks', ProdukController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('diskon-produks', DiskonProdukController::class);
        Route::resource('gambars', GambarController::class)->except('create,store,show');
        Route::resource('notas', NotaController::class);
        Route::resource('kurirs', KurirController::class);
        Route::resource('metode-pembayarans', MetodePembayaranController::class);
        Route::resource('jenis-pengirimans', JenisPengirimanController::class);
    });
    

    //Admin Login
    Route::post('login', [AdminLoginController::class, 'authenticate'])->name('authAdmin');
    Route::get('login', [AdminLoginController::class, 'login'])->name('loginAdmin');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logoutAdmin');
});



//Login - user
Auth::routes();
Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::get('login', [LoginController::class, 'showLoginUI'])->name('loginUI');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


//User
Route::post('/favorit', [UserController::class, 'addOrDeleteFavorite'])->name('favorit');
Route::get('/favorit-page', [UserController::class, 'showFavoriteProducts'] )->name('favorite.page');
Route::resource('user/alamatPengiriman', AlamatPengirimanController::class);
Route::resource('keranjang', KeranjangController::class);

Route::post('/beli-barang/{produkId}', [UserController::class, 'beliBarang'])->name('beliBarang');
Route::get('/alamat-list', [UserController::class, 'listAlamat'])->name('listAlamat');
Route::get('/alamat-edit/{alamatId}', [UserController::class, 'editAlamat'])->name('editAlamat');
Route::post('/alamat-insert', [UserController::class, 'insertAlamat'])->name('insertAlamat');


// TEST ROUTE 
Route::get('/checkout',function(){
    return view('produk.checkout');
})->name('checkout');