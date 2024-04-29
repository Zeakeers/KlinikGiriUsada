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
        Schema::table('gaji', function (Blueprint $table) {
            $table->foreign(['gaji_idpekerja'], 'gaji_ibfk_1')->references(['pekerja_id'])->on('pekerja')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gaji', function (Blueprint $table) {
            $table->dropForeign('gaji_ibfk_1');
        });
    }
};
