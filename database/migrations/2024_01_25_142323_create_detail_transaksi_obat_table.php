<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksiObatTable extends Migration
{
    public function up()
    {
        Schema::create('detail_transaksi_obat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_obat_id')->constrained();
            $table->foreignId('barang_obat_id')->constrained();
            $table->integer('jumlah');
            // Tambahkan kolom lain sesuai kebutuhan

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_transaksi_obat');
    }
};