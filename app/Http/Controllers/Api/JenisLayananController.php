<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarLayanan;
use App\Models\JenisLayanan;
use Illuminate\Http\Request;

class JenisLayananController extends Controller
{
    public function show($id, $date)
    {
        $jenis = JenisLayanan::join('pekerja', 'pekerja_id', '=', 'jenis_layanan.jenis_iddokter')
            // ->join('daftar_layanan', 'daftar_id', '=', 'daftar_layanan.daftar_idjenis')
            ->select('jenis_id', 'jenis_layanan', 'pekerja_nama')
            ->where('jenis_id', $id)
            // ->orderBy('daftar_id', 'desc')
            ->first();
        $daftar = DaftarLayanan::select('daftar_tanggal')
            ->where('daftar_idjenis', $id)
            ->where('daftar_tanggal', 'LIKE', $date . '%')
            ->where('daftar_status', '=', 'BERLANGSUNG')
            ->orderBy('daftar_id', 'desc')->count();
        return response()->json([
            'status' => 200,
            'title' => 'Berhasil Ditampilkan',
            'message' => "Berhasil menampilkan ke layar.",
            'data' => $jenis,
            'antrian' => [
                'daftar_nomor' => $daftar,
            ]
        ], 200);
    }
}
