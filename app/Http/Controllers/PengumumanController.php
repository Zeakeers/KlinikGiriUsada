<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $count_pengumuman = Pengumuman::count(); // hitung jumlah pengumuman
        $hidden_button = ($count_pengumuman == 3) ? true : false; // set nilai disable button
       
        $pengumumans = Pengumuman::all(); // query untuk mendapatkan semua pengumuman
        
        $pengumuman = Pengumuman::orderBy('pengumuman_tanggal', 'desc')->get();
        return view('Backend.pengumuman_index', compact('pengumuman','pengumumans','hidden_button'));
    }

    public function create()
    {
        return view('Backend.pengumuman_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pengumuman_judul' => 'required',
            'pengumuman_deskripsi' => 'required',
            'pengumuman_tanggal' => 'required|date',
            'pengumuman_status' => 'required',
            'pengumuman_gambar' => 'nullable|image|max:2048'
        ]);

        $pengumuman = new Pengumuman();
        $pengumuman->pengumuman_judul = $request->pengumuman_judul;
        $pengumuman->pengumuman_deskripsi = $request->pengumuman_deskripsi;
        $pengumuman->pengumuman_tanggal = $request->pengumuman_tanggal;
        $pengumuman->pengumuman_status = $request->pengumuman_status;
        
        if ($request->hasFile('pengumuman_gambar')) {
            $gambar = $request->file('pengumuman_gambar');
            $gambar->storeAs('public/pengumuman', $gambar->getClientOriginalName());
            $pengumuman->pengumuman_gambar = $gambar->getClientOriginalName();
        }

        $pengumuman->save();

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan');
    }
 

    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('Backend.pengumuman_edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pengumuman_judul' => 'required',
            'pengumuman_deskripsi' => 'required',
            'pengumuman_tanggal' => 'required|date',
            'pengumuman_status' => 'required',
            'pengumuman_gambar' => 'nullable|image|max:2048'
        ]);

        $pengumuman = Pengumuman::find($id);
        $pengumuman->pengumuman_judul = $request->pengumuman_judul;
        $pengumuman->pengumuman_deskripsi = $request->pengumuman_deskripsi;
        $pengumuman->pengumuman_tanggal = $request->pengumuman_tanggal;
        $pengumuman->pengumuman_status = $request->pengumuman_status;
        
        if ($request->hasFile('pengumuman_gambar')) {
            $gambar = $request->file('pengumuman_gambar');
            $gambar->storeAs('public/pengumuman', $gambar->getClientOriginalName());
            $pengumuman->pengumuman_gambar = $gambar->getClientOriginalName();
        }

        $pengumuman->save();

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil diupdate');
    }

    

    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();

        return redirect('/pengumuman')->with('success', 'Pengumuman berhasil dihapus.');
    }
}

