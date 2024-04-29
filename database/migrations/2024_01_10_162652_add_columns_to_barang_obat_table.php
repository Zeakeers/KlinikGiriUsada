<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBarangObatTable extends Migration
{
    public function up()
    {
        Schema::table('barang_obat', function (Blueprint $table) {
            $table->string('kode_obat');  
            $table->integer('jumlah_stock'); 
        });
    }

    public function down()
    {
        Schema::table('barang_obat', function (Blueprint $table) {
            $table->dropColumn('kode_obat');
            $table->dropColumn('jumlah_stock');
        });
    }


};
