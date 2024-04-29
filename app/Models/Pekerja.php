<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerja extends Model
{
    use HasFactory;
    protected $table = 'pekerja';
    public $timestamps = false;
    protected $primaryKey = 'pekerja_id';
    protected $fillable = ['pekerja_nama', 'pekerja_nowa', 'pekerja_alamat', 'pekerja_foto', 'pekerja_idkategori'];

    public function kategori()
    {
        return $this->belongsTo(KategoriPekerja::class, 'pekerja_idkategori', 'katekerja_id');
    }
}
