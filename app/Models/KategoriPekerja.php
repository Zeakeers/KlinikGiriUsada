<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPekerja extends Model
{
    use HasFactory;

    protected $table = 'kategori_kerja';
    protected $primaryKey = 'katekerja_id';
    protected $fillable = ['katekerja_nama'];

    public function pekerja()
    {
        return $this->hasMany(Pekerja::class, 'pekerja_idkategori', 'katekerja_id');
    }
}