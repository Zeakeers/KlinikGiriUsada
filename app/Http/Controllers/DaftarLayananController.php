<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarLayanan;
use App\Models\Pasien;
use App\Models\JenisLayanan;
use Illuminate\Support\Carbon;
class DaftarLayananController extends Controller
{
    public function index(Request $request)
    {
        $backend = DaftarLayanan::with('pasien', 'jenis_layanan')->orderBy('daftar_id', 'asc')->get();
        return view('backend.daftar_layanan.daftar_layanan', compact('backend'));
    }
    
    public function show($id)
    {
        $pasien = Pasien::find($id);
        return view('backend.daftar_layanan.createLayanan', compact('pasien'));
    }
    
    public function create(Request $request)
    {
        $now = Carbon::now();
        $daftar_layanan = new DaftarLayanan();
        $daftar_layanan->date_time = $now;
        $next_nomor_layanan = DaftarLayanan::max('daftar_id') + 1;
        $list_pasien = Pasien::all();
        $list_jenis_layanan = JenisLayanan::all();
    
        return view('backend.daftar_layanan.createLayanan', compact('list_pasien', 'list_jenis_layanan', 'next_nomor_layanan'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'daftar_id' => 'required',
            'daftar_tanggal' => 'required',
            'daftar_status' => 'required',
            'daftar_idpasien' => 'required',
            'daftar_idjenis' => 'required',

        ]);
        

    //  Buat objek DaftarLayanan baru
     $daftarLayanan = new DaftarLayanan;

     $daftarLayanan->daftar_id = $request->input('daftar_id');
     $daftarLayanan->daftar_tanggal = $request->input('daftar_tanggal');
     $daftarLayanan->daftar_status = $request->input('daftar_status');
     $daftarLayanan->daftar_idpasien = $request->input('daftar_idpasien');
     $daftarLayanan->daftar_idjenis = $request->input('daftar_idjenis');

  
    
        $daftarLayanan->save();
        return redirect()->route('daftar_layanan.index')->with('success', 'Data layanan berhasil ditambahkan.');
        // return redirect('/daftar_layanan')->with('success', 'Daftar Layanan telah ditambahkan!');
    }
    
    public function edit($id)
    {
        $daftar_layanan = DaftarLayanan::find($id);
        $list_pasien = Pasien::all();
        $list_jenis_layanan = JenisLayanan::all();
    
        if (!$daftar_layanan) {
            return redirect()->route('daftar_layanan.index')->with('error', 'Layanan tidak ditemukan');
        }
    
        return view('backend.daftar_layanan.edit', compact('daftar_layanan', 'list_pasien', 'list_jenis_layanan'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
        
            'daftar_id' => 'required',
            'daftar_tanggal' => 'required',
            'daftar_status' => 'required',      
            'daftar_idjenis' => 'required',
        ]);
    
        $daftar_layanan = DaftarLayanan::findOrFail($id);
        $daftar_layanan->daftar_tanggal = $request->get('daftar_tanggal');
        $daftar_layanan->daftar_id = $request->get('daftar_id');
        $daftar_layanan->daftar_status = $request->get('daftar_status');
        $daftar_layanan->daftar_idjenis = $request->get('daftar_idjenis');
        $daftar_layanan->save();
        return redirect()->route('daftar_layanan.index')->with('success', 'Daftar Layanan telah diupdate!');
    }
    
    public function destroy($id)
    {
        $daftarLayanan = DaftarLayanan::findorFail($id);
        $daftarLayanan->delete();
    
        return redirect()->route('daftar_layanan.index')->with('success', 'Daftar Layanan telah dihapus!');
    }
    

    public function search(Request $request)
    {
        $katakunci = $request->get('katakunci');
        $pasien = Pasien::find($katakunci);
        $next_nomor_antrian = DaftarLayanan::max('daftar_nomor') + 1;
        $list_jenis_layanan = JenisLayanan::all();
    
        return view('backend.daftar_layanan.createLayanan', compact('pasien', 'next_nomor_antrian', 'list_jenis_layanan'));
    }

    public function cariPasien($pasien_id)
    {
        $pasien = Pasien::find($pasien_id);
        
        if ($pasien) {
            return response()->json([
                'success' => true,
                'pasien' => $pasien
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }
    }