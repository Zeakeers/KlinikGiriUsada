<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DaftarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JenisLayananController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ResetPasswordController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/auth/register', [AuthController::class, 'getData'])->middleware(['auth:sanctum', 'abilities:pasien']);
Route::post('/auth/register', [AuthController::class, 'registerPasien']);
Route::post('/reset/password/nomor', [ResetPasswordController::class, 'checkNomor']);
Route::post('/auth/login', [AuthController::class, 'loginPasien']);
Route::post('/auth/logout', [AuthController::class, 'logoutPasien'])->middleware(['auth:sanctum', 'abilities:pasien']);
Route::middleware(['auth:sanctum', 'abilities:pasien'])->group(function () {
    Route::post('/user/ubah/',  [ProfileController::class, 'store']);
    Route::post('/reset/password/nomor/ubah', [ResetPasswordController::class, 'ubahPassword']);
    Route::post('/daftar', [DaftarController::class, 'store']);
    Route::get('/daftar/{id}', [DaftarController::class, 'show']);
    Route::put('/daftar/batal/{iddaftar}', [DaftarController::class, 'batal']);
    Route::get('/daftar/pasien/{id}', [DaftarController::class, 'showPasien']);
    Route::get('/layanan/{id}/{date}', [JenisLayananController::class, 'show']);
    Route::get('/daftar/pasien/{idpasien}/{idlayanan}/{date}', [DaftarController::class, 'showCheck']);
    Route::get('/daftar/jam/pasien/{idpasien}/tanggal/{date}/layanan/{idjenis}', [DaftarController::class, 'showTime']);
});
