<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';
    protected $fillable = ['pengumuman_id','pengumuman_judul', 'pengumuman_deskripsi', 'pengumuman_tanggal', 'pengumuman_status', 'pengumuman_gambar'];

    public function getTanggalAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public function setTanggalAttribute($value)
    {
        $this->attributes['pengumuman_tanggal'] = date('Y-m-d', strtotime($value));
    }

    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'Aktif' : 'Tidak Aktif';
    }

    public function scopeAktif($query)
    {
        return $query->where('pengumuman_status', 1);
    }
}
