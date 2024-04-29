<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksiObat extends Model
{
    protected $table = 'detail_transaksi_obat';

    protected $fillable = ['transaksi_obat_id', 'barang_obat_id', 'jumlah'];

    public function transaksiObat()
    {
        return $this->belongsTo(TransaksiObat::class);
    }

    public function barangObat()
    {
        return $this->belongsTo(BarangObat::class);
    }
}
