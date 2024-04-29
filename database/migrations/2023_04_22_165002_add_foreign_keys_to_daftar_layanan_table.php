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
        Schema::table('daftar_layanan', function (Blueprint $table) {
            $table->foreign(['daftar_idjenis'], 'daftar_layanan_ibfk_2')->references(['jenis_id'])->on('jenis_layanan')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['daftar_idpasien'], 'daftar_layanan_ibfk_1')->references(['pasien_id'])->on('pasien')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daftar_layanan', function (Blueprint $table) {
            $table->dropForeign('daftar_layanan_ibfk_2');
            $table->dropForeign('daftar_layanan_ibfk_1');
        });
    }
};
