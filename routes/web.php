<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

//User
Route::get('index/user', function () {
    return view('user.index');
})->name('user.index')->middleware('auth:web');

//Admin
Route::get('index/admin', function () {
    return view('admin.index');
})->name('admin.index')->middleware('auth:admin');
