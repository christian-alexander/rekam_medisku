<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HubunganController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\FaskesHasTenagaKesehatanController;

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
Route::get('/profil/reset_foto_profil',[ProfilController::class,'reset_foto_profil'])->middleware('auth');
Route::post('/profil/update_foto_profil',[ProfilController::class,'update_foto_profil'])->middleware('auth');
Route::post('/profil/update_profil',[ProfilController::class,'update_profil'])->middleware('auth');

// rekam medis pasien
Route::get('/rekam_medis/daftar_rekam_medis/{tipe_rekam_medis}/{pasien_id}',[RekamMedisController::class,'daftar_rekam_medis'])->middleware('auth');
Route::get('/rekam_medis/get_data/{id}',[RekamMedisController::class,'get_data'])->middleware('auth');
Route::get('/rekam_medis/show_pdf',[RekamMedisController::class,'show_pdf'])->middleware('auth');
Route::resource('/rekam_medis',RekamMedisController::class)->middleware('auth');

// ADMIN ONLY
// user account setting
Route::get('/akun/get_data/{id}',[AkunController::class,'get_data'])->middleware('auth');
Route::resource('/akun',AkunController::class)->middleware('auth');
// faskes
Route::get('/faskes/get_data/{faskes_id}',[FaskesController::class,'get_data'])->middleware('auth');
Route::resource('/faskes',FaskesController::class)->middleware('auth');


// TENAGA KESEHATAN ONLY
// faskes has tenaga kesehatan, di profil
Route::post('/faskes_has_tenaga_kesehatan/tambah',[FaskesHasTenagaKesehatanController::class,'tambah'])->middleware('auth');
Route::post('/faskes_has_tenaga_kesehatan/hapus/{id}',[FaskesHasTenagaKesehatanController::class,'hapus'])->middleware('auth');

// hubungan
Route::get('/hubungan/permintaan_menghubungkan',[HubunganController::class, 'permintaan'])->middleware('auth');
Route::post('/hubungan/terima/{hubungan_id}',[HubunganController::class, 'terima'])->middleware('auth');
Route::post('/hubungan/tolak/{hubungan_id}',[HubunganController::class, 'tolak'])->middleware('auth');
Route::get('/hubungan/pasien_saya',[HubunganController::class, 'pasien_saya'])->middleware('auth');

// PASIEN ONLY
// hubungan
Route::get('/hubungan/pengajuan_menghubungkan',[HubunganController::class, 'pengajuan'])->middleware('auth');
Route::get('/hubungan/get_tenaga_kesehatan/{tenaga_kesehatan_id}',[HubunganController::class, 'get_tenaga_kesehatan'])->middleware('auth');
Route::get('/hubungan/get_faskes_has_tenaga_kesehatan/{tenaga_kesehatan_id}',[HubunganController::class, 'get_faskes_has_tenaga_kesehatan'])->middleware('auth');
Route::post('/hubungan/submit_ajukan/{tenaga_kesehatan_id}',[HubunganController::class, 'submit_ajukan'])->middleware('auth');
Route::get('/hubungan/tenaga_kesehatan_saya',[HubunganController::class, 'tenaga_kesehatan_saya'])->middleware('auth');
Route::post('/hubungan/putuskan_hubungan/{tenaga_kesehatan_id}',[HubunganController::class, 'putuskan_hubungan'])->middleware('auth');


