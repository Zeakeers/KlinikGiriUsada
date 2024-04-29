<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangObat extends Model
{
    protected $table = 'barang_obat';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'harga', 'kode_obat', 'jumlah_stock', 'status'];

    public function transaksi()
    {
        return $this->hasMany(TransaksiObat::class);
    }

    public function updateStock($quantity)
    {
        $this->update([
            'jumlah_stock' => $this->jumlah_stock - $quantity,
        ]);
    }
}