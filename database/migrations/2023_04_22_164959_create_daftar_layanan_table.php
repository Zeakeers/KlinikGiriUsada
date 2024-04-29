<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_layanan', function (Blueprint $table) {
            $table->integer('daftar_id', true);
            $table->dateTime('daftar_tanggal');
            $table->string('daftar_status', 15);
            $table->integer('daftar_idpasien')->index('daftar_idpasien');
            $table->integer('daftar_idjenis')->index('daftar_idjenis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_layanan');
    }
};
