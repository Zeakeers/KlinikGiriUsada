<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PekerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pekerja')->insert([
            [
                'pekerja_nama' => 'Budi Setiyono',
                'pekerja_nowa' => '085627162547',
                'pekerja_foto' => null,
                'pekerja_alamat' => 'Nganjuk, Jawa Timur',
                'pekerja_idkategori' => '1',
            ],
            [
                'pekerja_nama' => 'Suwarno Astaman',
                'pekerja_nowa' => '088912743582',
                'pekerja_foto' => null,
                'pekerja_alamat' => 'Nganjuk, Jawa Timur',
                'pekerja_idkategori' => '1',
            ],
            [
                'pekerja_nama' => 'Alina Risma Setiana',
                'pekerja_nowa' => '088912743582',
                'pekerja_foto' => null,
                'pekerja_alamat' => 'Nganjuk, Jawa Timur',
                'pekerja_idkategori' => '1',
            ],
        ]);
    }
}
