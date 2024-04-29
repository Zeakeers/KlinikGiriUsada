<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerja;
use App\Models\KategoriPekerja;

class PekerjaController extends Controller
{
    public function index()
    {
        $pekerja = Pekerja::with('kategori')->get();
        return view('backend.pekerja.tampil', compact('pekerja'));
    }

    public function create()
    {
        $kategoriPekerja = KategoriPekerja::all();
        return view('backend.pekerja.create', compact('kategoriPekerja'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pekerja_nama' => 'required',
            'pekerja_nowa' => 'required',
            'pekerja_alamat' => 'required',
            'pekerja_foto' => 'nullable|image|max:20048',
            'pekerja_idkategori' => 'required',
        ]);

        $pekerja = new Pekerja();
        $pekerja->pekerja_nama = $request->pekerja_nama;
        $pekerja->pekerja_nowa = $request->pekerja_nowa;
        $pekerja->pekerja_alamat = $request->pekerja_alamat;
        $pekerja->pekerja_idkategori = $request->pekerja_idkategori;

        if ($request->hasFile('pekerja_foto')) {
            $gambar = $request->file('pekerja_foto');
            $gambar->storeAs('public/pekerja', $gambar->getClientOriginalName());
            $pekerja->pekerja_foto = $gambar->getClientOriginalName();
        }

        $pekerja->save();

        return redirect()->route('pekerja.index')->with('success', 'Pekerja Sukses ditambahkan.');
    }

    public function edit($pekerja_id)
    {
        $pekerja = Pekerja::findOrFail($pekerja_id);
        $kategoriPekerja = KategoriPekerja::all();
        return view('backend.pekerja.edit', compact('pekerja', 'kategoriPekerja'));
    }

    public function update(Request $request, $pekerja_id)
    {
        $validatedData = $request->validate([
            'pekerja_nama' => 'required',
            'pekerja_nowa' => 'required',
            'pekerja_alamat' => 'required',
            'pekerja_foto' => 'nullable|image|max:2048',
            'pekerja_idkategori' => 'required',
        ]);

        $pekerja = Pekerja::findOrFail($pekerja_id);
        $pekerja->pekerja_nama = $request->pekerja_nama;
        $pekerja->pekerja_nowa = $request->pekerja_nowa;
        $pekerja->pekerja_alamat = $request->pekerja_alamat;
        $pekerja->pekerja_idkategori = $request->pekerja_idkategori;

        if ($request->hasFile('pekerja_foto')) {
            $gambar = $request->file('pekerja_foto');
            $gambar->storeAs('public/pekerja', $gambar->getClientOriginalName());
            $pekerja->pekerja_foto = $gambar->getClientOriginalName();
        }

        $pekerja->save();

        return redirect()->route('pekerja.index')->with('success', 'Pekerja telah Berhasil di Update.');
    }

    public function destroy(Pekerja $pekerja)
    {
        $pekerja_nama = $pekerja->pekerja_nama;
        $pekerja->delete();
        return redirect()->route('pekerja.index')->with('success', "Data pekerja '$pekerja_nama' berhasil dihapus.");
    }

    public function search(Request $request)
    {
        $cari = $request->input('cari');

        $pekerja = Pekerja::where('pekerja_nama', 'LIKE', '%' . $cari . '%')->get();

        return view('backend.pekerja.tampil', compact('pekerja'));
    }
}