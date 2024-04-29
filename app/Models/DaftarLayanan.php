<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarLayanan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'daftar_id';
    protected $table = 'daftar_layanan';

    protected $fillable = [
        'daftar_tanggal',
        'daftar_status',
        'daftar_idpasien',
        'daftar_idjenis',
    ];

    public function jenis_layanan1()
    {
        return $this->hasMany(JenisLayanan::class, 'jenis_id', 'daftar_idjenis');
    }
    public function rules()
    {
        return [
            'daftar_tanggal' => 'required',
            'daftar_status' => 'required',
            'daftar_idpasien' => 'required',
            'daftar_idjenis' => 'required',
        ];
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'daftar_idpasien');
    }

    public function jenis_layanan()
    {
        return $this->belongsTo(JenisLayanan::class, 'daftar_idjenis');
    }
}
