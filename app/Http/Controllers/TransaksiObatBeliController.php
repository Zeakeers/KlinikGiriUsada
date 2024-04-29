<?php

namespace App\Http\Controllers;

use App\Models\Transobatbeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class TransaksiObatBeliController extends Controller
{
    public function index(Request $request)
{
    $transaksiBeli = Transobatbeli::all();
    return view('Backend.Apotek.riwayatBeli', compact('transaksiBeli'));
}
    public function daftarTransaksiBeli()
    {
        $transaksiBeli = Transobatbeli::all();
    
        return view('Backend.Apotek.riwayatBeli', compact('transaksiBeli'));
    }

    public function cariTransaksi(Request $request)
{
    $query = Transobatbeli::query();

    if ($request->filled('cari_nama')) {
        $query->where(function ($query) use ($request) {
            $query->where('nama_obat', 'like', '%' . $request->input('cari_nama') . '%')
                ->orWhere('kode_obat', 'like', '%' . $request->input('cari_nama') . '%');
        });
    }

    // Pencarian berdasarkan tanggal
    if ($request->filled('cari_tanggal')) {
        $query->whereDay('tanggal_trans', $request->input('cari_tanggal'));
    }

    // Pencarian berdasarkan bulan
    if ($request->filled('cari_bulan')) {
        $query->whereMonth('tanggal_trans', $request->input('cari_bulan'));
    }

    // Pencarian berdasarkan tahun
    if ($request->filled('cari_tahun')) {
        $query->whereYear('tanggal_trans', $request->input('cari_tahun'));
    }

     // Pencarian berdasarkan rentang tanggal mulai dan tanggal selesai
     if ($request->filled(['cari_mulai', 'cari_selesai'])) {
        $query->whereBetween('tanggal_trans', [$request->input('cari_mulai'), $request->input('cari_selesai')]);
    }

    $transaksiBeli = $query->get();

    return view('Backend.Apotek.riwayatBeli', compact('transaksiBeli'));
}


    public function detail($id)
    {
        $transaksiBeli = Transobatbeli::findOrFail($id);

        return view('backend.apotek.detailtransbeli', compact('transaksiBeli'));
    }

    public function edit($id)
    {
        $transaksiBeli = Transobatbeli::findOrFail($id);

        return view('backend.apotek.edittransbeli', compact('transaksiBeli'));
    }

    public function update(Request $request, $id)
    {
        $transaksiBeli = Transobatbeli::findOrFail($id);
        $request->validate([
            'nama_obat' => 'required',
            'kode_obat' => 'required',
            'tanggal_trans' => 'required',
            'harga' => 'required',
            'jumlah_stock' => 'required',
        ]);

        $transaksiBeli->update($request->all());

        return redirect()->route('daftar.transaksiBeli')->with('success', 'Data transaksi beli berhasil diperbarui.');
    }



    // Contoh fungsi hapus
    public function hapus($id)
    {
        // Logika hapus data, sesuaikan dengan kebutuhan
        $transaksiBeli = Transobatbeli::findOrFail($id);
        $transaksiBeli->delete();

        Session::flash('success', 'Data transaksi beli berhasil dihapus.');
        return redirect()->route('daftar.transaksiBeli');
    }
}
