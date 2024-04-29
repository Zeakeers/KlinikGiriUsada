<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekamMedis;

class CetakUserController extends Controller
{
    public function cetakUser($rekam_id)
    {
        $rekammedis1 = RekamMedis::join('daftar_layanan', 'daftar_id', '=', 'rekam_medis.rekam_idlayanan')
            ->join('pasien', 'pasien_id', '=', 'daftar_layanan.daftar_idpasien')->where('rekam_id', $rekam_id)->first();
        // $rekammedis1 = RekamMedis::findOrFail($rekam_id);

        return view('cetak_user', compact('rekammedis1'));
    }
}
