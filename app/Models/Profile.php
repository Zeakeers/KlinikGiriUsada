<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'pasien_id';
    protected $table = 'pasien';

    protected $fillable = [
        'pasien_nama',
        'pasien_nik',
        'pasien_gender',
        'pasien_foto',
        'pasien_alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_idpasien');
    }
}
