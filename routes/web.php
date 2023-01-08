<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HubunganController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\TenagaKesehatanController;

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

Route::get('/create_symlink', function () {
    Artisan::call('storage:link');
});


// dashboard
Route::get('/', [DashboardController::class,'index'])->middleware('auth');

// login
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'authenticate']);
Route::get('/logout', [LoginController::class,'logout']);
// register
Route::get('/register', [RegisterController::class,'index']);
Route::post('/register', [RegisterController::class,'store']);

// change password
Route::post('/change_password',[ChangePasswordController::class,'change_password'])->middleware('auth');

// profil
Route::get('/profil',[ProfilController::class,'index'])->middleware('auth');

// rekam medis pasien
Route::get('/rekam_medis/daftar_rekam_medis/{tipe_rekam_medis}',[RekamMedisController::class,'daftar_rekam_medis'])->middleware('auth');
Route::resource('/rekam_medis',RekamMedisController::class)->middleware('auth');

// ADMIN ONLY
// user account setting
Route::get('/akun/get_data/{id}',[AkunController::class,'get_data'])->middleware('auth');
Route::resource('/akun',AkunController::class)->middleware('auth');
// instalasi
Route::resource('/faskes',FaskesController::class)->middleware('auth');


// TENAGA KESEHATAN ONLY
Route::get('/hubungan/permintaan_menghubungkan',[HubunganController::class, 'permintaan'])->middleware('auth');
Route::get('/pasien_saya',[PasienController::class, 'index'])->middleware('auth');

// PASIEN ONLY
Route::get('/hubungan/pengajuan_menghubungkan',[HubunganController::class, 'pengajuan'])->middleware('auth');
Route::get('/tenaga_kesehatan_saya',[TenagaKesehatanController::class, 'index'])->middleware('auth');

