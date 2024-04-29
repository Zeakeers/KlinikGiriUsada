<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pengumuman;
use App\Models\Pekerja;
use App\Models\DaftarLayanan;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPasienHariIni = Pasien::count();

        $pengumuman = Pengumuman::orderBy('pengumuman_tanggal', 'desc')->get();
    
        $jumlahPengumuman = Pengumuman::where('pengumuman_status', 'aktif')->count();
    
        $jumlahPekerja = Pekerja::count();

        $layanan = DaftarLayanan::with('pasien', 'jenis_layanan')->orderBy('daftar_id', 'asc')->get();
    
        return view('backend.dashboard', compact('jumlahPasienHariIni', 'jumlahPengumuman', 'jumlahPekerja', 'layanan', 'pengumuman'));
    }
}