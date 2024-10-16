<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\KelolaAkunController as AdminKelolaAkunController;
// use App\Http\Controllers\items\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncomingItemController;
use App\Http\Controllers\IncomingItemDetailController;
// use App\Http\Controllers\ItemController as ControllersItemController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\OutgoingItemController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengawasController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::group(['prefix' => '/admin', 'middleware' => ['can:isAdmin']], function() {
        Route::get('/', AdminController::class)->name('admin');
        Route::get('/dashboard/admin', AdminController::class, '__invoke')->name('admin.dashboard');
    });

    Route::group(['prefix' => '/unit', 'middleware' => ['can:isUnit']], function() {
        Route::get('/', [UnitController::class, 'index'])->name('unit');
    });

    Route::group(['prefix' => '/pengawas', 'middleware' => ['can:isPengawas']], function() {
        Route::get('/', [PengawasController::class, 'index'])->name('pengawas');
        // Route::get('/data', [PengawasController::class, '__invoke'])->name('pengawas.dataBarang');
    });


});

// item
Route::get('/item/list', [ItemController::class, '__invoke'])->name('item.list');
Route::get('/item/create',[ItemController::class, 'create'])->name('item.create');
Route::post('/item/store', [ItemController::class, 'store'])->name('item.store');
Route::get('/item/detail/{code}', [ItemController::class, 'show'])->name('item.show');
Route::get('/item/edit/{code}', [ItemController::class, 'edit'])->name('item.edit');
Route::post('/item/update', [ItemController::class, 'update'])->name('item.update');
Route::get('/item/delete/{code}', [ItemController::class, 'destroy'])->name('item.destroy');
Route::get('/item/data', [ItemController::class, 'getData'])->name('item.data');


Route::get('/barangMasuk', [IncomingItemController::class, 'index'])->name('item.barangMasuk');
Route::get('/barangMasuk/create', [IncomingItemController::class, 'create'])->name('bm.create');
Route::post('/barangMasuk/store', [IncomingItemController::class, 'store'])->name('barangMasuk.store');
Route::get('/detailbm/{kode}', [IncomingItemDetailController::class, 'show'])->name('item.detailBM');




Route::get('/barangKeluar', [OutgoingItemController::class, 'index'])->name('item.barangKeluar');

//kategori

Route::get('/kategori', [CategoryController::class, 'index'])->name('admin.kategori');
Route::post('/kategori/store', [CategoryController::class, 'store'])->name('kategori.store');
Route::get('/kategori/delete/{id}', [CategoryController::class, 'destroy'])->name('kategori.destroy');

// Akun

//user
Route::get('/user', [AdminKelolaAkunController::class, 'index'])->name('admin.user');
Route::get('/user/create',[AdminKelolaAkunController::class, 'create'])->name('user.create');
Route::post('/user/store', [AdminKelolaAkunController::class, 'store'])->name('user.store');
Route::delete('/user/delete/{nip}', [AdminKelolaAkunController::class, 'destroy'])->name('user.destroy');

//pegawai
Route::get('/pegawai',[PegawaiController::class, 'index'])->name('admin.pegawai');
Route::get('/pegawai/create',[PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::delete('/pegawai/delete/{nip}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

// Supplier
Route::get('/supplier', [SupplierController::class, 'index'])->name('admin.supplier');
Route::get('/supplier/create',[SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::delete('/supplier/delete/{code}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

// Pengadaan
Route::get('/pengadaan', [SubmissionController::class, 'index'])->name('admin.pengadaan');
Route::get('/pengadaan/create',[SubmissionController::class, 'create'])->name('pengadaan.create');
Route::get('/detailPengadaan/{code}',[SubmissionController::class, 'show'])->name('pengadaan.show');
Route::post('/pengadaan/store', [SubmissionController::class, 'store'])->name('pengadaan.store');

// Permintaan
Route::get('/permintaan', [RequestController::class, 'index'])->name('admin.permintaan');
Route::get('/permintaan/create',[RequestController::class, 'create'])->name('permintaan.create');
Route::post('/permintaan/store', [RequestController::class, 'store'])->name('permintaan.store');
Route::get('/detailPermintaan/{code}',[RequestController::class, 'show'])->name('permintaan.show');

