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
        Schema::create('pasien', function (Blueprint $table) {
            $table->integer('pasien_id', true);
            $table->string('pasien_nama', 50);
            $table->string('pasien_nik', 16);
            $table->char('pasien_gender', 1);
            $table->string('pasien_foto', 50)->nullable();
            $table->string('pasien_alamat', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
};
