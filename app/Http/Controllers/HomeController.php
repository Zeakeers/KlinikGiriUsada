<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class HomeController extends Controller

{
    
    public function index()
{
    $pengumumans = Pengumuman::where('pengumuman_status', 'aktif')
        ->orderBy('pengumuman_tanggal', 'desc')
        ->paginate(1);
    
    $pengumuman = Pengumuman::where('pengumuman_status', 'aktif')->get();
    $count = $pengumuman->count();

    if ($count == 0) {
        return view('frontend.home')
            ->with('notification', 'Tidak terdapat pengumuman')
            ->with('pengumumans', collect())
            ->with('pengumuman', collect()); // Mengirim koleksi kosong jika tidak ada pengumuman
    }

    return view('frontend.home', compact('pengumuman', 'pengumumans'));
}

}
