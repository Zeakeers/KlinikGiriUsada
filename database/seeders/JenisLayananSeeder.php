<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class JenisLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_layanan')->insert([
            [
                'jenis_layanan' => 'Umum',
                'jenis_iddokter' => 1,
            ],
            [
                'jenis_layanan' => 'Gigi',
                'jenis_iddokter' => 2,
            ], [
                'jenis_layanan' => 'Ibu & Anak',
                'jenis_iddokter' => 3,
            ],
        ]);
    }
}
