<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class CetakPasienController extends Controller
{
    public function cetak($pasien_id)
    {
        $pasien = Pasien::find($pasien_id);

        return view('cetak_pasien', compact('pasien'));
    }
}
