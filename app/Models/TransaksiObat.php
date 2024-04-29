<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TransaksiObat extends Model
{
    protected $table = 'transaksi_obat';

    protected $fillable = ['nama_pasien', 'tanggal_trans','total_harga'];

    public function barangObat()
    {
        return $this->belongsTo(BarangObat::class);
    }

    public function detailTransaksi()
{
    return $this->hasMany(DetailTransaksiObat::class);
}
}
