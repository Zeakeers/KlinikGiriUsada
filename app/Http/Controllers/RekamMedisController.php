<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\DaftarLayanan;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rekammedis = RekamMedis::join('daftar_layanan', 'daftar_id', '=', 'rekam_medis.rekam_idlayanan')
            ->join('pasien', 'pasien_id', '=', 'daftar_layanan.daftar_idpasien');
        $cari = $request->cari;

        if (strlen($cari)) {
            $rekammedis = $rekammedis->where('pasien_nama', 'like', "%$cari%");
        }
        $rekammedis = $rekammedis->orderBy('pasien_id', 'desc')->get();
        return view('rekam_medis.tampil', compact('rekammedis'));
        // return view('rekam_medis.tampil', compact('rekammedis'))->with('rekammedis', $rekammedis);

    }

    public function create()
    {
        $rekammedis = DaftarLayanan::with('pasien', 'jenis_layanan')->orderBy('daftar_id', 'asc')->where('daftar_status', 'BERLANGSUNG')->get();
        // return view('backend.daftar_layanan.daftar_layanan', compact('backend'));
        return view('rekam_medis.tambah1', compact('rekammedis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           
            'rekam_tanggal'         => 'required|date',
            'rekam_terapinonobat'   => 'required',
            'rekam_anamnesa'        => 'required',
            'rekam_alergi'          => 'required',
            'rekam_prognosa'        => 'required',
            'rekam_terapiobat'      => 'required',
            'rekam_bmhp'            => 'required',
            'rekam_diagnosa'        => 'required',
            'rekam_kesadaran'       => 'required',
            'rekam_suhu'            => 'required',
            'rekam_sistole'         => 'required',
            'rekam_respiratorydate' => 'required',
            'rekam_diastole'        => 'required',
            'rekam_heartrate'       => 'required',
            'rekam_tinggibadan'     => 'required',
            'rekam_beratbadan'      => 'required',
            'rekam_lingkarperut'    => 'required',
            'rekam_imt'             => 'required',
            'rekam_kecelakaan'      => 'required',
            'rekam_tenagamedis'     => 'required',
            'rekam_statuspulang'    => 'required',
            'rekam_idlayanan',
        ]);

        RekamMedis::create($request->all());
        // Ubah status pasien menjadi "Selesai"
        $daftarLayanan = DaftarLayanan::findOrFail($request->rekam_idlayanan);
        $daftarLayanan->daftar_status = "SELESAI";
        $daftarLayanan->save();

        return redirect()->route('rekam_medis.index')
            ->with('success', 'Rekam Medis Pasien berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $rekam_id)
    {
        $rekammedis = RekamMedis::join('daftar_layanan', 'daftar_id', '=', 'rekam_medis.rekam_idlayanan')
            ->join('pasien', 'pasien_id', '=', 'daftar_layanan.daftar_idpasien')
            ->findOrFail($rekam_id);

        return view('rekam_medis.show', compact('rekammedis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rekammedis = RekamMedis::join('daftar_layanan', 'daftar_id', '=', 'rekam_medis.rekam_idlayanan')
            ->join('pasien', 'pasien_id', '=', 'daftar_layanan.daftar_idpasien');
        $rekammedis = RekamMedis::findOrFail($id);
        return view('rekam_medis.edit', compact('rekammedis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rekammedis = RekamMedis::findOrFail($id);

        $request->validate([
            
            'rekam_tanggal'         => 'required|date',
            'rekam_terapinonobat'       => 'required',
            'rekam_anamnesa'        => 'required',
            'rekam_alergi'          => 'required',
            'rekam_prognosa'        => 'required',
            'rekam_terapiobat'      => 'required',
            'rekam_bmhp'            => 'required',
            'rekam_diagnosa'        => 'required',
            'rekam_kesadaran'       => 'required',
            'rekam_suhu'            => 'required',
            'rekam_sistole'         => 'required',
            'rekam_respiratorydate' => 'required',
            'rekam_diastole'        => 'required',
            'rekam_heartrate'       => 'required',
            'rekam_tinggibadan'     => 'required',
            'rekam_beratbadan'      => 'required',
            'rekam_lingkarperut'    => 'required',
            'rekam_imt'             => 'required',
            'rekam_kecelakaan'      => 'required',
            'rekam_tenagamedis'     => 'required',
            'rekam_statuspulang'    => 'required',
            'rekam_idlayanan'       => 'required',
        ]);
        
        $rekammedis->update($request->all());

        return redirect()->route('rekam_medis.show', $rekammedis->rekam_id)
            ->with('success', 'Data rekam medis Pasien berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function mencari(Request $request)
    {
        $carikunci = $request->get('carikunci');
        $pasien = Pasien::find($carikunci);
        
    
        return view('rekam_medis.tambah1', compact('pasien', 'rekammedis'));
    }

    public function cariPasiennama($daftar_status)
    {
        $pasien = DaftarLayanan::find($daftar_status);
        
        if ($pasien) {
            return response()->json([
                'success' => true,
                'daftar_layanan' => $daftar_layanan
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function submitForm(Request $request)
    {
        // Lakukan validasi input jika diperlukan
        $validatedData = $request->validate([
            'daftar_id' => 'required',
            
        ]);

        // Cari data pasien berdasarkan ID yang diinputkan
        $pasien = Pasien::findOrFail($validatedData['daftar_id']);

        // Ubah status pasien menjadi "Selesai"
        $pasien->status = "SELESAI";
        $pasien->save();

        // Simpan data rekam medis
        RekamMedis::create($request->all());

        // Redirect atau lakukan tindakan lainnya setelah perubahan status dan penyimpanan data rekam medis
        // ...

        return redirect()->back()->with('success', 'Status pasien telah diubah menjadi Selesai dan data rekam medis berhasil disimpan.');
    }
    }

