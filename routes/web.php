<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;

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
    return view('auth/login');
});

Auth::routes();

Route::get('logout', function ()
{
    auth()->logout();
    
    return Redirect::to('/login');
})->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');
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