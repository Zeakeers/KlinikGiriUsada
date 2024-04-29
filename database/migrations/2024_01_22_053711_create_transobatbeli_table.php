<?php

// database/migrations/[timestamp]_create_transobatbeli_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransobatbeliTable extends Migration
{
    public function up()
    {
        Schema::create('transobatbeli', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->string('kode_obat')->nullable(); // Tambahkan kolom kode_obat
            $table->timestamp('tanggal_trans')->nullable();
            $table->integer('jumlah_stock')->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transobatbeli');
    }
};