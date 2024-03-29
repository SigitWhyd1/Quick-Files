<?php

use App\Http\Controllers\Api\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\KategoriSuratController;
use App\Http\Controllers\DataKategoriController;
use App\Http\Controllers\ManajemenTugasController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RiwayatSuratController;
use App\Http\Controllers\TugasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//route login
Route::post(
    '/login',
    [App\Http\Controllers\Api\Auth\LoginController::class, 'index']
);

// Route register
Route::post(
    '/register',
    [App\Http\Controllers\AuthController::class, 'register']
);

//logout
Route::post(
    '/logout',
    [App\Http\Controllers\Api\Auth\LoginController::class, 'logout']
);

Route::group(['prefix' => 'surat-masuk', 'as' => 'surat-masuk.', 'middleware' => 'auth:api'], function() {
    Route::get('', [SuratMasukController::class, 'index'])->name('index');
    Route::post('', [SuratMasukController::class, 'store'])->name('store');
    Route::patch('/{id}', [SuratMasukController::class, 'update'])->name('update');
    Route::delete('/{id}', [SuratMasukController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'surat-keluar', 'as' => 'surat-keluar.', 'middleware' => 'auth:api'], function() {
    Route::get('', [SuratKeluarController::class, 'index'])->name('index');
    Route::post('', [SuratKeluarController::class, 'store'])->name('store');
    Route::patch('/{id}', [SuratKeluarController::class, 'update'])->name('update');
    Route::delete('/{id}', [SuratKeluarController::class, 'delete'])->name('delete');
});

Route::resource('kategori-surat', KategoriSuratController::class);

Route::resource('data-kategori', DataKategoriController::class);

Route::resource('manajemen_tugas', ManajemenTugasController::class);

Route::resource('riwayat_surat', RiwayatSuratController::class);

Route::resource('notifikasi', NotifikasiController::class);

Route::resource('pencarian', PencarianController::class);

Route::resource('tugas', TugasController::class);

Route::resource('pengguna', PenggunaController::class);

//group route with prefix "admin"
Route::prefix('admin')->group(function () {
    //group route with middleware "auth:api"
    Route::group(['middleware' => 'auth:api'], function () {
        //dashboard
        Route::get(
            '/dashboard',
            App\Http\Controllers\Api\Admin\DashboardController::class
        );

        //permissions
        Route::get('/permissions', [
            \App\Http\Controllers\Api\Admin\PermissionController::class,
            'index'
        ])->middleware('permission:permissions.index');

        //permissions all
        Route::get('/permissions/all', [
            \App\Http\Controllers\Api\Admin\PermissionController::class,
            'all'
        ])->middleware('permission:permissions.index');

        //roles all
        Route::get('/roles/all', [\App\Http\Controllers\Api\Admin\RoleController::class, 'all'])
            ->middleware('permission:roles.index');

        //roles
        Route::apiResource('/roles', App\Http\Controllers\Api\Admin\RoleController::class)
            ->middleware('permission:roles.index|roles.store|roles.update|roles.delete');

        //users
        Route::apiResource('/users', App\Http\Controllers\Api\Admin\UserController::class)
            ->middleware('permissions:users.index|users.store|users.update|users.delete');


    });
});
