<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PatientController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();

        return view('pasiens.tampil', compact('pasiens'));
    }
    public function create()
    {
        return view('pasiens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_nama' => 'required',
            'pasien_nik'  => 'required|min:16|max:16',
            'pasien_alamat' => 'required',
            'pasien_gender' => 'required',
            'tanggal_lahir' => 'required|date',

        ]);

        Pasien::create($request->all());

        return redirect()->route('pasiens.tampil')
            ->with('success', 'Pasien berhasil ditambahkan.');
    }
    public function show(string $id)
    {
        $pasiens = Pasien::findOrFail($id);
        return view('pasiens.show', compact('pasiens'));
    }
    public function edit(string $id)
    {
        $pasiens = Pasien::findOrFail($id);
        return view('pasiens.edit', compact('pasiens'));
    }
    public function update(Request $request, string $id)
    {
        $pasiens = Pasien::findOrFail($id);
        $request->validate([
            'pasien_nama' => 'required',
            'pasien_nik'  => 'required',
            'pasien_alamat' => 'required',
            'pasien_gender' => 'required',
            'tanggal_lahir' => 'required|date',
            'pasien_gender' => 'required',

        ]);

        $pasiens->update($request->all());

        return redirect()->route('pasiens.tampil')
            ->with('success', 'Pasien berhasil diupdate.');
    }
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasiens.tampil')
            ->with('success', 'Pasien berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $cari = $request->input('cari');
    
        $pasiens = Pasien::where('pasien_nik', 'LIKE', '%' . $cari . '%')
            ->orWhere('pasien_nama', 'LIKE', '%' . $cari . '%')
            ->get();
    
        return view('pasiens.tampil', compact('pasiens'));
    }

}
