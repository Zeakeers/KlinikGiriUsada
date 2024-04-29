<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiObatTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi_obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_obat_id');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('barang_obat_id')->references('id')->on('barang_obat')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi_obat');
    }

};
