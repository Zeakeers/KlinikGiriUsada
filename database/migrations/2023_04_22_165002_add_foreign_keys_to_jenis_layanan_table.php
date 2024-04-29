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
        Schema::table('jenis_layanan', function (Blueprint $table) {
            $table->foreign(['jenis_iddokter'], 'jenis_layanan_ibfk_1')->references(['pekerja_id'])->on('pekerja')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jenis_layanan', function (Blueprint $table) {
            $table->dropForeign('jenis_layanan_ibfk_1');
        });
    }
};
