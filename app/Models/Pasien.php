<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
   
    use HasFactory;
    protected $table="pasien";
    public $timestamps = false;
    protected $primaryKey = 'pasien_id';
    protected $fillable = ['pasien_id','pasien_nama','pasien_nik' , 'jenis_id', 'pasien_alamat', 'pasien_gender', 'tanggal_lahir'];


    public function JenisLayanan()
    {
        return $this->belongsTo(JenisLayanan::class);
    }
}