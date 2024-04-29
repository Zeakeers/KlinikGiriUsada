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
        Schema::create('jenis_layanan', function (Blueprint $table) {
            $table->integer('jenis_id', true);
            $table->string('jenis_layanan', 50);
            $table->integer('jenis_iddokter')->index('jenis_iddokter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_layanan');
    }
};
