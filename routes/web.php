<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\ProdukUserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukImageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RajaOngkirController;

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
    return redirect('index');
});

Route::get('/index', [HomeUserController::class, 'index'])->name('user.index');
Route::get('/more_product/{jenis_produk}', [ProdukUserController::class, 'moreProduct'])->name('more_product');
Route::get('/product_detail/{id}', [ProdukUserController::class, 'show'])->name('product_detail');

Route::prefix('product')->group(function (){
Route::get('/retail', [ProdukUserController::class, 'indexRetail'])->name('product.retail');
Route::get('/grosir', [ProdukUserController::class, 'indexGrosir'])->name('product.grosir');
});

Route::prefix('ongkir')->group(function (){
    Route::get('/get_provinsi', [RajaOngkirController::class, 'getProvinsi'])->name('ongkir.get_provinsi');
    Route::get('/get_kota', [RajaOngkirController::class, 'getKota'])->name('ongkir.get_kota');
    Route::post('/', [RajaOngkirController::class, 'cekOngkir'])->name('ongkir.index');
    
});

Route::prefix('cart')->group(function (){
Route::get('/', [CartController::class, 'index'])->name('cart.index');
// Route::get('/clear', [CartController::class, 'clear_cart'])->name('cart.clear');
Route::delete('/delete', [CartController::class, 'destroy'])->name('cart.delete');
Route::patch('/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/load', [CartController::class, 'show'])->name('cart.load');
Route::post('/add/{id}', [CartController::class, 'create'])->name('cart.create');
});

Route::prefix('pembayaran')->group(function (){
Route::get('/checkout', [PembayaranController::class, 'checkout'])->name('pembayaran.checkout');
Route::post('/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
Route::get('/cek_pembayaran', [PembayaranController::class, 'edit'])->name('pembayaran.cek_pembayaran');
Route::post('/konfirmasi', [PembayaranController::class, 'update'])->name('pembayaran.konfirmasi');
});

Auth::routes();

Route::get('logout', function ()
{
    auth()->logout();
    
    return Redirect::to('/login');
})->name('logout');

Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::prefix('brand')->group(function () {
    Route::get('/profil/{id}', [BrandController::class, 'index'])->name('brand.profil');
    Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
    Route::post('/password', [BrandController::class, 'change_password'])->name('brand.password')->middleware('is_admin');
    Route::post('/update', [BrandController::class, 'update'])->name('brand.update')->middleware('is_admin');
});

Route::get('/getBrand', [AdminController::class, 'getBrand'])->name('getBrand')->middleware('is_admin');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index')->middleware('is_admin');
    Route::post('/password', [AdminController::class, 'change_password'])->name('admin.password')->middleware('is_admin');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create')->middleware('is_admin');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store')->middleware('is_admin');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit')->middleware('is_admin');
    Route::post('/update', [AdminController::class, 'update'])->name('admin.update')->middleware('is_admin');
    Route::post('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete')->middleware('is_admin');
    Route::get('/detail/{id}', [AdminController::class, 'show'])->name('admin.detail')->middleware('is_admin');
});

Route::prefix('/produk')->group(function (){
    Route::get('/', [ProdukController::class, 'index'])->name('produk.index')->middleware('is_admin');
    Route::get('/getProduk', [ProdukController::class, 'getProduk'])->name('produk.getProduk')->middleware('is_admin');
    Route::get('/create', [ProdukController::class, 'create'])->name('produk.create')->middleware('is_admin');
    Route::post('/store', [ProdukController::class, 'store'])->name('produk.store')->middleware('is_admin');
    Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit')->middleware('is_admin');
    Route::post('/update', [ProdukController::class, 'update'])->name('produk.update')->middleware('is_admin');
    Route::get('/detail/{id}', [ProdukController::class, 'show'])->name('produk.detail')->middleware('is_admin');
    Route::post('/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.delete')->middleware('is_admin');
});
Route::prefix('/produk_image')->group(function (){
    Route::post('/store', [ProdukImageController::class, 'store'])->name('produk_image.store')->middleware('is_admin');
    Route::delete('/delete/{id}', [ProdukImageController::class, 'destroy'])->name('produk_image.delete')->middleware('is_admin');
});
Route::get('/admin/produk/foto', function () {
    return view('/admin/produk/foto');
});
