<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('home');
})->name('home'); // Tambahkan nama route 'home'

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);


Route::get('daftar', [AuthController::class, 'registratioAdminnForm'])->name('daftar');
Route::post('daftar', [AuthController::class, 'daftar']);


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//User (CUSTOMER)
Route::middleware('auth:web')->group(function(){
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('user.index');
    Route::get('/jual-sampah', [CustomerController::class, 'jualSampah'])->name('customer.jual_sampah');
    Route::post('/request-penjualan-sampah', [CustomerController::class, 'requestSampah'])->name('customer.requestSampah');
    Route::get('/hasil-karya', [CustomerController::class, 'hasilKarya'])->name('customer.hasil_karya');
    Route::post('/simpan-transaksi', [CustomerController::class, 'simpanTransaksi'])->name('customer.simpanTransaksi');

    Route::get('/aktivitas', [CustomerController::class, 'aktivitas'])->name('customer.aktivitas');
    Route::get('/poin', [CustomerController::class, 'poin'])->name('customer.poin');
    // Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
});


// Route::get('index/user', function () {
//     return view('user.index');
// })->name('user.index')->middleware('auth:web');



//Admin
Route::middleware('auth:admin')->group(function () {
    Route::get('/index/admin', [AdminController::class, 'dashboard'])->name('admin.index');    
    Route::get('/pengambilan-sampah', [AdminController::class, 'ambilSampah'])->name('admin.pengambilan_sampah');
    Route::get('/beli-sampah', [AdminController::class, 'beliSampah'])->name('admin.beli_sampah');
    //
    Route::get('/transaksi-sampah', [AdminController::class, 'transaksiSampah'])->name('admin.transaksi_sampah');
    //
    Route::get('/data-karya', [AdminController::class, 'dataKarya'])->name('admin.data_karya');
    Route::get('/form-tambah-karya', [AdminController::class, 'formTambahKarya'])->name('admin.form_tambah_karya');
    Route::post('/admin.form_tambah_karya', [AdminController::class, 'tambahHasilKarya'])->name('admin.tambah_karya');
    // Route untuk mengedit hasil karya
    Route::get('/admin/edit_karya/{id}', [AdminController::class, 'editKarya'])->name('admin.edit_karya');
    Route::put('/admin/karya/{id}', [AdminController::class, 'updateKarya'])->name('admin.update_karya');
    // Route untuk menghapus hasil karya
    Route::delete('/admin/delete_karya/{id}', [AdminController::class, 'deleteKarya'])->name('admin.delete_karya');
    Route::post('/kurangi-stok', [CustomerController::class, 'kurangiStok'])->name('kurangi.stok');
    Route::get('/admin/transaksi-karya', [AdminController::class, 'transaksiWithKarya'])->name('admin.transaksi_karya');
    



    Route::get('/admin/transaksi-sampah', [AdminController::class, 'transaksiSampah'])->name('admin.transaksi_sampah');
    Route::post('/admin/transaksi-sampah', [AdminController::class, 'transaksiSampahStore']);
    Route::get('/admin/cek-telepon/{telepon}', [AdminController::class, 'cekTelepon']);
    Route::get('/admin/get-jenis-sampah', [AdminController::class, 'getJenisSampah']);
    Route::get('/admin/get-harga-per-kg/{jenisBarang}', [AdminController::class, 'getHargaPerKg']);
    Route::post('/admin/transaksi-sampah', [AdminController::class, 'transaksiSampahStore'])->name('admin.transaksi_sampah');
});

