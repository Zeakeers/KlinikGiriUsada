<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Transobatbeli extends Model
{
    protected $table = 'transobatbeli';

    protected $fillable = ['kode_obat','nama_obat', 'tanggal_trans','harga','jumlah_stock'];

}