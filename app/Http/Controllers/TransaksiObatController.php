<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BarangObat;
use App\Models\TransaksiObat;
use App\Models\DetailTransaksiObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;


class TransaksiObatController extends Controller
{
    public function index(Request $request)
{
    $barangObat = BarangObat::where('status', 1)->get();
    // Dapatkan data pencarian (jika ada)
    $cari = $request->input('cari');

    // Cek apakah ada parameter pencarian
    if ($cari) {
        // Lakukan pencarian berdasarkan nama atau kode_obat
        $barangObat = BarangObat::where('nama', 'like', '%' . $cari . '%')
                                ->orWhere('kode_obat', 'LIKE', '%' . $cari . '%')
                                ->get();
    } else {
        // Jika tidak ada parameter pencarian, ambil semua data BarangObat
        $barangObat = BarangObat::all();
    }

    // Dapatkan juga data TransaksiObat (jika dibutuhkan)
    $transaksiObat = TransaksiObat::all();

    return view('Backend.Apotek.tampil', compact('barangObat', 'transaksiObat'));
}


public function tampil()
{
    // Dapatkan data barang obat
    $barangObat = BarangObat::all();

    return view('Backend.Apotek.tampil', compact('barangObat'));
}
    public function create()
    {
    
        return view('Backend.Apotek.create');
    }

    public function store1(Request $request)
    {
        // $request->validate([
        //     'nama_pasien' => 'required|string|max:255',
        //     'keranjang' => 'required|array',
        // ]);

        try {

            // Simpan transaksi
            $transaksiObat = new TransaksiObat([
                'nama_pasien' => $request->nama_pasien,
                'tanggal_trans' => now(),
                'total_harga' => 231,
            ]);

            $transaksiObat->save();
            
            $dataIds = $request->input('id_barang');
            $jumlahs = $request->input('jumlah');
            
            foreach ($dataIds as $index => $dataId) {
                $detailtransaksi = new DetailTransaksiObat([
                    'transaksi_obat_id' => $transaksiObat->id,
                    'barang_obat_id' => $dataId,
                    'jumlah' => $jumlahs[$index],
                ]);
                $detailtransaksi->save();
            
                // Lakukan sesuatu dengan $dataId, misalnya, simpan ke database
                // ...
            }
                //dapat id transaksi-> tambah detail
            // foreach ($request->input('keranjang') as $id => $item) {
            //     // $barangObat = BarangObat::findOrFail($id);
    
            //     // Tambahkan record ke dalam tabel detail transaksi
            //     $detailtransaksi = new DetailTransaksiObat([
            //         'transaksi_obat_id' => $transaksiObat->id,
            //         'barang_obat_id' => 23,
            //         'jumlah' => $item["jumlah"],
            //     ]);
    
            //     $detailtransaksi->save();
    
            //     // Tambahkan harga barang ke total harga transaksi
            //     // $transaksiObat->total_harga += $barangObat->harga * $item['quantity'];
            // }
    
            // Simpan total harga setelah menambahkan semua detail
            $transaksiObat->save();

            // Tampilkan pop-up konfirmasi
            // return redirect()->route('detail.transaksi', $transaksiObat->id);
            return 'bisa';

        } catch (\Exception $e) {
            return 'eror '.$e;
        }
    }




public function detail($id)
{
    // Ambil data transaksi obat berdasarkan ID
    $transaksiObat = TransaksiObat::findOrFail($id);

    return View::make('Backend.Apotek.detailtransjual', compact('transaksiObat'));
}


    
    public function show(TransaksiObat $transaksiObat)
    {
        return view('Backend.Apotek.tampil');
    }
    
    public function destroy($id)
    {
        $barang = BarangObat::findOrFail($id);
        
        // Ambil nilai status dari input
        $status = request('status');
    
        // Update status sesuai dengan nilai yang diambil
        $barang->status = $status === 'nonaktif' ? false : true;
        $barang->save();
    
        return redirect()->route('apotek.tampil')->with('success', 'Data berhasil diperbarui.');
    }
    public function daftarTransaksiJual()
    {
        $transaksiObat = TransaksiObat::all();
    
        return view('Backend.Apotek.riwayatJual', compact('transaksiObat'));
    }
    
    public function cariTransaksi(Request $request)
{
    $query = TransaksiObat::query();

    if ($request->filled('cari_nama')) {
        $query->where('nama_pasien', 'like', '%' . $request->input('cari_nama') . '%');
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

    $transaksiObat = $query->get();

    return view('Backend.Apotek.riwayatJual', compact('transaksiObat'));
}
   

public function edit($id)
{
    // Ambil data transaksi obat berdasarkan ID
    $transaksiObat = TransaksiObat::findOrFail($id);

    return View::make('Backend.Apotek.edittransjual', compact('transaksiObat'));
}

public function update(Request $request, TransaksiObat $transaksiObat, $id)
{
    $transaksiObat = TransaksiObat::findOrFail($id);
    $request->validate([
        // 'nama_obat' => 'required',
        'nama_pasien' => 'required',
        'tanggal_trans' => 'required',
        'jumlah' => 'required|integer|min:0',
        
    ]);


    $transaksiObat->update($request->all());

    return redirect()->route('daftar.transaksi')->with('success', 'Transaksi berhasil diperbarui!');
}
    
    

}
