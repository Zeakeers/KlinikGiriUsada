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
        Schema::create('pekerja', function (Blueprint $table) {
            $table->integer('pekerja_id', true);
            $table->string('pekerja_nama', 50);
            $table->string('pekerja_nowa', 13);
            $table->string('pekerja_alamat', 100);
            $table->string('pekerja_foto', 50)->nullable();
            $table->tinyInteger('pekerja_idkategori')->index('pekerja_idkategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pekerja');
    }
};
