<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenditureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('expenditures')->insert([
            [
                'date' => '2025-01-01',
                'description' => 'Pembelian bahan baku kue kering (tepung, mentega, gula)',
                'nominal' => '750000',
            ],
            [
                'date' => '2025-01-03',
                'description' => 'Pembelian bahan baku kue basah (santan, telur, gula aren)',
                'nominal' => '550000',
            ],
            [
                'date' => '2025-01-05',
                'description' => 'Pembayaran listrik dan air untuk produksi',
                'nominal' => '300000',
            ],
            [
                'date' => '2025-01-07',
                'description' => 'Gaji karyawan produksi',
                'nominal' => '2000000',
            ],
            [
                'date' => '2025-01-10',
                'description' => 'Biaya promosi dan pemasaran (spanduk, iklan media sosial)',
                'nominal' => '400000',
            ],
        ]);
    }
}
