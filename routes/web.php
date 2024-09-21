<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DBBackupController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenWaliController;
use App\Http\Controllers\KaprodiController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::permanentRedirect('/', '/login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(DosenController::class)
    ->group(function () {
        Route::get('data-dosen', 'index')->name('data.data-dosen');
        Route::post('/tambah-dosen', 'addDosen');
        Route::post('/dosenlist/{id}/delete', 'deleteDosen')->name('dosenlist.delete');
        Route::put('dosen/{id}', 'update')->name('dosen.update');
        Route::get('dosen/{id}/edit', 'edit')->name('dosen.edit');
        Route::get('/anggotaKelas', 'halaman_dosen_walikelas')->name('dosen.anggotaKelas');
    });

Route::get('/dashboard/dosen', function () {
    return view('dosen.dashboard-dosen');
})->name('dashboard.dosen');

Route::controller(KelasController::class)
    ->group(function () {
        Route::get('data-kelas', 'index')->name('data-kelas.index');
        Route::get('/detail-Kelas/{id}', 'detailKelas')->name('detail.kelas');
        Route::get('class-list', 'classList');
        Route::get('kelas/{id}/edit', 'edit')->name('kelas.edit');
        Route::post('/tambah-kelas', 'addClass');
        Route::post('/classlist/{id}/delete', 'removeClass');
        Route::put('kelas/{id}', 'update')->name('kelas.update');
    });

Route::controller(MahasiswaController::class)
    ->group(function () {
        Route::get('/form-mahasiswa/{id}', 'formAddMahasiswa')->name('tambah.mahasiswa');
        Route::post('/tambah-mahasiswa', 'addMahasiswa');
        Route::get('mahasiswa/{id}/edit', 'edit')->name('mahasiswa.edit');
        Route::put('mahasiswa/{id}', 'update')->name('mahasiswa.update');
        Route::get('/dashboard/mahasiswa', 'dashboard')->name('dashboard.mahasiswa');
        Route::get('mahasiswa/{id}', 'show')->name('mahasiswa.detail');
        Route::post('/mahasiswa/{id}/request-edit','requestEdit')->name('mahasiswa.request.edit');
    });

Route::controller(DosenWaliController::class)
    ->group(function() {
        Route::get('/dosen/request', 'showRequests')->name(name: 'dosen-wali.request');
        Route::get('/dashboard/dosen/wali_kelas', 'dashboard_wali_dosen')->name('dashboard.dosen.wali_kelas');
        Route::post('/dosen-wali/requests/{id}/accept', 'acceptRequest')->name('dosen-wali.requests.accept');
        Route::post('/dosen-wali/requests/{id}/reject', 'rejectRequest')->name('dosen-wali.requests.reject');
    });

Route::controller(KaprodiController::class)
    ->group(function() {
        Route::get('/dashboard/kaprodi', 'dashboard_kaprodi')->name('dashboard.kaprodi')->middleware(['auth', 'role:kaprodi']);
    });

Route::controller(DashboardController::class)
    ->group(function() {
        Route::get('/dashboard/superadmin', 'dashboard')->name('dashboard.superadmin')->middleware(['auth', 'role:superadmin']);
    });

Route::get('/dashboard/dosen', function () {
    return view('dosen.dashboard-dosen');
})->name('dashboard.dosen')->middleware(['auth', 'role:dosen']);

Route::resource('profil', ProfilController::class)->except('destroy');

Route::resource('manage-user', UserController::class);
Route::resource('manage-role', RoleController::class);
Route::resource('manage-menu', MenuController::class);
Route::resource('manage-permission', PermissionController::class)->only('store', 'destroy');


Route::get('dbbackup', [DBBackupController::class, 'DBDataBackup']);
