<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', [UserController::class, 'index'])->name('index');
Route::middleware(['IsSiswa'])->group(function (){
    Route::post('/store', [UserController::class, 'storePengaduan'])->name('store');
    // laporan
    Route::get('/laporan/{siapa?}', [UserController::class, 'laporan'])->name('laporan');
    // logout
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
Route::middleware(['guest'])->group(function (){
    // login
    Route::post('/login/auth', [UserController::class, 'login'])->name('login');
    // register
    Route::get('/register', [UserController::class, 'formRegister'])->name('formRegister');
    Route::post('/register/auth', [UserController::class, 'register'])->name('register');
});
Route::prefix('admin')->group(function (){
    Route::middleware(['IsAdmin'])->group(function (){
        // petugas
        Route::resource('petugas', PetugasController::class);
        // siswa
        Route::resource('siswa', SiswaController::class);
        // laporan
        Route::get('laporan',[LaporanController::class,'index'])->name('laporan.index');
        Route::post('getlaporan',[LaporanController::class,'getlaporan'])->name('laporan.getlaporan');
        Route::get('laporan/cetak/{from}/{to}',[LaporanController::class,'cetaklaporan'])->name('laporan.cetaklaporan');
    });
    Route::middleware(['IsPetugas'])->group(function () {
        // dashboard
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index'); 
        // pengaduan
        Route::resource('pengaduan', PengaduanController::class);
        // tanggapan
        Route::post('tanggapan/createorupdate',[TanggapanController::class,'createorupdate'])->name('tanggapan.createorupdate');
        // logout
        Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
    });
    Route::middleware(['IsGuest'])->group(function () {
        // login
        Route::get('/',[AdminController::class,'formlogin'])->name('admin.formlogin');
        Route::post('/login',[AdminController::class,'login'])->name('admin.login');
    });

});
