<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLayanan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'jenis_id';
    protected $table = 'jenis_layanan';

    protected $fillable = [
        'jenis_id',
        'jenis_layanan',
        'jenis_iddokter',
    ];

    public function daftarlayanan()
    {
        return $this->belongsTo(DaftarLayanan::class, 'daftar_idjenis');
    }
}
