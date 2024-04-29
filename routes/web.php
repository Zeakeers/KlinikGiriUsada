<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\dataadminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\CetakUserController;
use App\Http\Controllers\CetakPasienController;
use App\Http\Controllers\DaftarLayananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginF\MyLogin;
use App\Http\Controllers\TransaksiObatController;
use App\Http\Controllers\BarangObatController;
use App\Http\Controllers\TransaksiObatBeliController;
use App\Http\Controllers\DetailTransaksiController;
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

Route::get('/', [HomeController::class, 'index'])->name('berita.shw');
// Route::get('/post', [HomeController::class, 'show'])->name('berita.shw1');

// Route::get('/', function () {
//     return view('frontend.home');
// });
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth', 'verified')->name('dashboard');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('dataadmin', dataadminController::class)->middleware('auth', 'verified');

Route::view('/popup', 'frontend.popup');
Route::get('/loginlagi', [MyLogin::class, 'login'])->name('login');
Route::post('/loginme', [MyLogin::class, 'loginme'])->name('loginme');
// Route::get('/dashboard', [ MyLogin::class, 'dashboard'])->name('dashboard');


Route::get('/pengumuman', [PengumumanController::class, 'index'])->middleware('auth', 'verified')->name('pengumuman.index');
Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->middleware('auth', 'verified')->name('pengumuman.create');
Route::post('/pengumuman', [PengumumanController::class, 'store'])->middleware('auth', 'verified')->name('pengumuman.store');

Route::get('/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->middleware('auth', 'verified')->name('pengumuman.edit');
Route::put('/pengumuman/{id}', [PengumumanController::class, 'update'])->middleware('auth', 'verified')->name('pengumuman.update');
Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->middleware('auth', 'verified')->name('pengumuman.destroy');

Route::get('/patients', [PatientController::class, 'index'])->middleware('auth', 'verified')->name('pasiens.tampil');
Route::post('/patients', [PatientController::class, 'store'])->middleware('auth', 'verified')->name('pasiens.store');
Route::get('/patients/create', [PatientController::class, 'create'])->middleware('auth', 'verified')->name('pasiens.create');
Route::get('/patients/{pasien}', [PatientController::class, 'show'])->middleware('auth', 'verified')->name('pasiens.show');
Route::get('/patients/{pasien}/edit', [PatientController::class, 'edit'])->middleware('auth', 'verified')->name('pasiens.edit');
Route::delete('patients/{pasien}', [PatientController::class, 'destroy'])->middleware('auth', 'verified')->name('pasiens.destroy');
Route::put('/patients/{pasien}', [PatientController::class, 'update'])->middleware('auth', 'verified')->name('pasiens.update');
Route::get('/pasiens/cari', [PatientController::class, 'search'])->name('pasiens.cari');


Route::get('/cetak_user/{rekam_Id}', [CetakUserController::class, 'cetakUser'])->name('rekam_medis.cetakUser');
Route::get('/cetak_pasien/{pasien_Id}', [CetakPasienController::class, 'cetak'])->name('pasiens.cetak');


Route::resource('rekam_medis', RekamMedisController::class)->middleware('auth', 'verified');

Route::resource('pekerja', PekerjaController::class)->middleware('auth', 'verified')->except(['show']);
Route::get('pekerja/search', [PekerjaController::class, 'search'])->name('pekerja.search');


Route::resource('/layanan', DaftarLayananController::class)->middleware('auth', 'verified');

Route::get('/layanan/create', [DaftarLayananController::class, 'create'])->name('backend.createLayanan');


Route::resource('pasien', PasienController::class)->middleware('auth', 'verified');
Route::resource('jenis_layanan', JenisLayananController::class)->middleware('auth', 'verified');
Route::resource('daftar_layanan', DaftarLayananController::class)->middleware('auth', 'verified');
Route::get('/cari-pasien/{pasien_id?}', [DaftarLayananController::class, 'cariPasien'])->name('daftar_layanan.cari_pasien');

Route::get('/apotek', [TransaksiObatController::class, 'index'])->name('apotek.tampil');
Route::resource('apotek', TransaksiObatController::class)->middleware('auth', 'verified');
Route::get('/apotek', [TransaksiObatController::class, 'tampil'])->name('apotek.tampil');

Route::get('/search_obat', [TransaksiObatController::class, 'index'])->name('search_obat');

Route::resource('barang_obat', BarangObatController::class);

Route::delete('/apotek/destroy/{id}', [TransaksiObatController::class, 'destroy'])->name('apotek.destroy');

Route::post('/transaksi-obat', [TransaksiObatController::class, 'store1'])->name('transaksi_obat.store');
Route::get('/transaksi-obat/{id}/editObat', [BarangObatController::class, 'edit'])-> middleware('auth', 'verified')->name('apotek.editObat');
Route::put('/transaksi-obat/{id}',  [BarangObatController::class, 'update'])-> middleware('auth', 'verified')->name('apotek.updateObat');
Route::get('/riwayatJual', [TransaksiObatController::class, 'daftarTransaksiJual'])->name('daftar.transaksi');
Route::get('/riwayatBeli', [TransaksiObatBeliController::class, 'daftarTransaksiBeli'])->name('daftar.transaksiBeli');
Route::get('/transaksi-obat-beli/cari', [TransaksiObatBeliController::class, 'cariTransaksi'])->name('transaksiBeli.cari');
Route::get('/apotek/transaksiobatbeli/{id}/detail', [TransaksiObatBeliController::class, 'detail'])->name('transaksiBeli.detail');
Route::get('/apotek/transaksiobatbeli/{id}/edit', [TransaksiObatBeliController::class, 'edit'])->name('transaksiBeli.edit');
Route::put('/apotek/transaksiobatbeli/{id}', [TransaksiObatBeliController::class, 'update'])->name('transaksibeli.update');
Route::get('/apotek/transaksiobatbeli/{id}/hapus', [TransaksiObatBeliController::class, 'hapus'])->name('transaksiBeli.hapus');
Route::delete('/apotek/transaksiobatbeli/{id}', [TransaksiObatBeliController::class, 'destroy'])->name('transaksiBeli.destroy');

Route::get('/transaksi-obat/cari', [TransaksiObatController::class, 'cariTransaksi'])->name('transaksiObat.cari');
Route::get('/apotek/transaksiobat/{id}/detail', [TransaksiObatController::class, 'detail'])->name('transaksiObat.detail');
Route::get('/apotek/transaksiobat/{id}/edit', [TransaksiObatController::class, 'edit'])->name('transaksiObat.edit');
Route::put('/apotek/transaksiobat/{id}', [TransaksiObatController::class, 'update'])->name('transaksiObat.update');
Route::get('/apotek/transaksiobat/{id}/hapus', [TransaksiObatController::class, 'hapus'])->name('transaksiObat.hapus');
Route::delete('/apotek/transaksiobat/{id}', [TransaksiObatController::class, 'destroy'])->name('transaksiObat.destroy');
Route::get('detail-transaksi/{id}', [DetailTransaksiController::class, 'show'])->name('detail.transaksi');


