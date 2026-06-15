<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JenisPembayaranController;
use App\Http\Controllers\PembayaranController;
use App\Models\Absensi;
use Symfony\Component\Routing\Loader\Configurator\Routes;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('santri', SantriController::class);
Route::resource('guru', GuruController::class);

Route::resource('kelas', KelasController::class);
Route::get(
    '/kelas/{id}/jadwal',
    [KelasController::class, 'jadwal']
)->name('kelas.jadwal');

Route::resource('mapel', MapelController::class);

Route::resource('jadwal', JadwalController::class);
Route::get(
    '/kelas/{id}/jadwal/pdf',
    [KelasController::class, 'cetakJadwal']
)->name('kelas.jadwal.pdf');

Route::get(
    '/absensi',
    [AbsensiController::class, 'index']
)->name('absensi.index');
Route::post(
    '/absensi',
    [AbsensiController::class, 'store']
)->name('absensi.store');
Route::get(
    '/absensi/pdf',
    [AbsensiController::class, 'pdf']
)->name('absensi.pdf');
Route::get(
    '/rekap-absensi',
    [AbsensiController::class, 'rekap']
)->name('absensi.rekap');
Route::get(
    '/rekap-absensi/pdf',
    [AbsensiController::class, 'rekapPdf']
)->name('absensi.rekap.pdf');


Route::resource(
    'jenis-pembayaran',
    JenisPembayaranController::class
);
Route::resource(
    'transaksi-pembayaran',
    PembayaranController::class
);
Route::get(
    '/transaksi-pembayaran/{id}/kwitansi',
    [PembayaranController::class, 'kwitansi']
)->name('transaksi-pembayaran.kwitansi');
