<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up()
  {
    DB::unprepared('
    CREATE EVENT change_daftar_status
    ON SCHEDULE
      EVERY 1 DAY
      STARTS CONCAT(DATE_FORMAT(CURRENT_TIMESTAMP, "%Y-%m-%d"), " 00:00:00") + INTERVAL 1 DAY
    DO
      UPDATE daftar_layanan SET daftar_status = "BATAL" WHERE daftar_status = "BERLANGSUNG" AND daftar_tanggal < CURDATE();
        ');
  }

  public function down()
  {
    DB::unprepared('DROP EVENT IF EXISTS change_daftar_status');
  }
};
