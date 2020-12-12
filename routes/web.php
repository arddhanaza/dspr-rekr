<?php

use App\Http\Controllers\AsistenController;
use App\Http\Controllers\CaasController;
use App\Http\Controllers\LoginController;
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


Route::group(['withoutMiddleware' => 'loggedIn'], function () {
    Route::get('/', [App\Http\Controllers\LoginController::class, 'index'])->name('landing_page');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'loggedin'], function () {
    Route::get('/caas/nilai/{id}', [CaasController::class, 'lihatNilaiById'])->name('caas_lihat_nilai_by_id');
    Route::get('/caas/nilai/all', [CaasController::class, 'lihatNilai'])->name('caas_lihat_nilai');

    Route::group(['middleware' => 'isAsisten'], function () {
        Route::get('/asisten/nilai/', [AsistenController::class, 'lihatNilai'])->name('asisten_lihat_nilai');
        Route::get('/asisten/nilai/caas/edit/{id}', [AsistenController::class, 'edit'])->name('asisten_edit_nilai');
        Route::post('/asisten/nilai/caas/edit/{id}/update', [AsistenController::class, 'update'])->name('asisten_update_nilai');
        Route::get('/asisten/nilai/microteaching/caas/add/{id}', [AsistenController::class, 'add_nilai_microteaching'])->name('add_nilai_microteaching');
        Route::post('/asisten/nilai/microteaching/caas/add/{id}/save', [AsistenController::class, 'save_nilai_microteaching'])->name('save_nilai_microteaching');
    });
});



