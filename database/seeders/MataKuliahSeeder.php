<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mata_kuliah')->insert([[
                'kode_mk' => 'RTI211001',
                'nama_mk' => 'Pancasila',
                'sks' => '2',
                'jam' => '2',
                'nilai' => 'B+'
            ],
            [
                'kode_mk' => 'RTI211004',
                'nama_mk' => 'Matematika 1',
                'sks' => '3',
                'jam' => '6',
                'nilai' => 'A'
            ],
            [
                'kode_mk' => 'RTI211005',
                'nama_mk' => 'Bahasa Inggris 1',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B+'
            ],
            [
                'kode_mk' => 'RTI211008',
                'nama_mk' => 'Keselamatan dan Kesehatan Kerja',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B'
            ],
            [
                'kode_mk' => 'RTI211003',
                'nama_mk' => 'Critical Thinking dan Problem Solving',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'A'
            ],
            [
                'kode_mk' => 'RTI211006',
                'nama_mk' => 'Dasar Pemrograman',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B+'
            ],
            [
                'kode_mk' => 'RTI211007',
                'nama_mk' => 'Praktikum Dasar Pemrograman',
                'sks' => '3',
                'jam' => '6',
                'nilai' => 'B+'
            ],
            [
                'kode_mk' => 'RTI211002',
                'nama_mk' => 'Konsep Teknologi Informasi',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B+'
            ],
            [
                'kode_mk' => 'RTI212008',
                'nama_mk' => 'Algoritma dan Struktur Data',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B'
            ],
            [
                'kode_mk' => 'RTI212009',
                'nama_mk' => 'Praktikum Algoritma dan Struktur Data',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'A'
            ],
            [
                'kode_mk' => 'RTI212010',
                'nama_mk' => 'Ilmu Komunikasi dan Organisasi',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B+'
            ],
            [
                'kode_mk' => 'RTI212004',
                'nama_mk' => 'Sistem Operasi',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'A'
            ],
            [
                'kode_mk' => 'RTI212005',
                'nama_mk' => 'Rekayasa Perangkat Lunak',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B'
            ],
            [
                'kode_mk' => 'RTI212002',
                'nama_mk' => 'Matematika 2',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B+'
            ],
            [
                'kode_mk' => 'RTI212001',
                'nama_mk' => 'Agama',
                'sks' => '2',
                'jam' => '2',
                'nilai' => 'A'
            ],
            [
                'kode_mk' => 'RTI212003',
                'nama_mk' => 'Bahasa Inggris 2',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'A'
            ],
            [
                'kode_mk' => 'RTI212007',
                'nama_mk' => 'Praktikum Basis Data',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B+'
            ],
            [
                'kode_mk' => 'RTI212006',
                'nama_mk' => 'Basis Data',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B+'
            ],
            [
                'kode_mk' => 'RTI213007',
                'nama_mk' => 'Pemrograman Berbasis Objek',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B'
            ],
            [
                'kode_mk' => 'RTI213008',
                'nama_mk' => 'Praktikum Pemrograman Berbasis Objek',
                'sks' => '3',
                'jam' => '6',
                'nilai' => 'B+'
            ],
            [
                'kode_mk' => 'RTI213002',
                'nama_mk' => 'Sistem Manajemen Kualitas',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B+'
            ],
            [
                'kode_mk' => 'RTI213001',
                'nama_mk' => 'Desain Antarmuka',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B+'
            ],
            [
                'kode_mk' => 'RTI213006',
                'nama_mk' => 'Matematika 3',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B+'
            ],
            [
                'kode_mk' => 'RTI213003',
                'nama_mk' => 'Kecerdasan Buatan',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B'
            ],
            [
                'kode_mk' => 'RTI213004',
                'nama_mk' => 'Desain dan Pemrograman Web',
                'sks' => '3',
                'jam' => '6',
                'nilai' => 'A'
            ],
            [
                'kode_mk' => 'RTI213005',
                'nama_mk' => 'Basis Data Lanjut',
                'sks' => '3',
                'jam' => '6',
                'nilai' => 'B+'
            ]
        ]);
    }
}