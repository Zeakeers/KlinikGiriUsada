<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangObat;
use App\Models\Transobatbeli;

class BarangObatController extends Controller
{
    public function index()
    {
        $barangObat = BarangObat::all();
        return view('Backend.Apotek.create', compact('barangObat'));
    }

    public function create()
    {
        return view('Backend.Apotek.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'kode_obat' => 'required',
        'nama' => 'required',
        'harga' => 'required',
        'jumlah_stock' => 'required|integer|min:0',
    ]);

    // Cek apakah sudah ada barang dengan kode obat dan nama yang sama
    $existingBarangObat = BarangObat::where('kode_obat', $request->kode_obat)
        ->where('nama', $request->nama)
        ->first();

    if ($existingBarangObat) {
        // Jika sudah ada, tambahkan jumlah stock yang baru diinputkan ke dalam stok yang sudah ada
        $existingBarangObat->update([
            'jumlah_stock' => $existingBarangObat->jumlah_stock + $request->jumlah_stock,
            'status' => 1,
        ]);

        // Simpan data ke tabel transobatbeli
        Transobatbeli::create([
            'kode_obat' => $existingBarangObat->kode_obat,
            'nama_obat' => $existingBarangObat->nama,
            'tanggal_trans' => now(),
            'harga' => $request->harga,
            'jumlah_stock' => $request->jumlah_stock,
            // tambahkan kolom lain yang diperlukan
        ]);
    } else {
        // Jika belum ada, buat data barang obat baru
        $newBarangObat = BarangObat::create($request->all());

        // Simpan data ke tabel transobatbeli
        Transobatbeli::create([
            'kode_obat' => $newBarangObat->kode_obat,
            'nama_obat' => $newBarangObat->nama,
            'tanggal_trans' => now(),
            'harga' => $request->harga,
            'jumlah_stock' => $request->jumlah_stock,
            // tambahkan kolom lain yang diperlukan
        ]);
    }

    return redirect()->route('barang_obat.index')->with('success', 'Data barang obat berhasil ditambahkan!');
}


    public function update(Request $request, BarangObat $barangObat, $id)
    {
        $barangObat = BarangObat::findOrFail($id);
        $request->validate([
            'kode_obat' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'jumlah_stock' => 'required|integer|min:0',
        ]);

        $barangObat->update($request->all());

        return redirect()->route('apotek.tampil')->with('success', 'Data barang obat berhasil diperbarui!');
    }

    public function destroy(BarangObat $barangObat)
    {
        $barangObat->delete();

        return redirect()->route('barang_obat.index')->with('success', 'Data barang obat berhasil dihapus!');

    }
    public function edit($id)
{
    // Ambil data BarangObat berdasarkan ID
    $barangObat = BarangObat::findOrFail($id);

    // Tampilkan form edit atau lakukan operasi lainnya
    return view('Backend.Apotek.editObat', compact('barangObat'));
}
    
}
