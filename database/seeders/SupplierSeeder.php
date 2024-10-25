<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'name' => 'PT MENSA BINASUKSES',
                'address' => 'JL. Orang Kayo Pingai, No. 40-A, RT 008, 36142, Payo Selincah, Kec. Jambi Tim., Kota Jambi, Jambi 36254',
                'contact_person' => '07417554079',
            ],
            [
                'name' => 'PT MERAPI UTAMA PHARMA',
                'address' => 'Jambi Trade Center No. 1, Jl. Lingkar Selatan No.RT. 26, Kenali Asam Bawah, Kec. Kota Baru, Kota Jambi, Jambi 36129',
                'contact_person' => '0741443735',
            ],
            [
                'name' => 'PT NARECO LESTARI',
                'address' => 'Jl. H. Kamil, Wijaya Pura, Kec. Jambi Sel., Kota Jambi, Jambi 36122',
                'contact_person' => '6285208453608',
            ],
            [
                'name' => 'PT NEW ASIAPHARM',
                'address' => 'Jl. Makalam, Cemp. Putih, Kec. Jelutung, Kota Jambi, Jambi 36123',
                'contact_person' => '6274124004',
            ],
            [
                'name' => 'PT PARIT PADANG GLOBAL',
                'address' => 'Jl.Kopral Udara Syaring No.141 RT 10 Kec, Paal Merah, Kec. Jambi Sel., Kota Jambi, 36135',
                'contact_person' => '	02146834411',
            ],
            [
                'name' => 'PT PENTA VALENT',
                'address' => 'Jl. KH. Hasyim Ashari, Rajawali, Kec. Jambi Tim., Kota Jambi, Jambi 36123',
                'contact_person' => '62215673891',
            ],
            [
                'name' => 'PT PHAROS',
                'address' => 'Lorong Merpati V, Eka Jaya, Kec. Jambi Sel., Kota Jambi, Jambi 36144',
                'contact_person' => '0741667815',
            ],
            [
                'name' => 'PT PUTRA MEGA MEDIKA',
                'address' => 'Jl. Orang Kayo Hitam No.25, Sulanjana, Kec. Jambi Tim., Kota Jambi, Jambi 36144',
                'contact_person' => '082281151843',
            ],
            [
                'name' => 'PT SAMUDRA JAYA ANUGERAH',
                'address' => 'JALAN RAYA KASANG PUDAK N0 34 RT 24, Kasang Pudak, Kec. Kumpeh Ulu, Kabupaten Muaro Jambi, Jambi 36383',
                'contact_person' => '081266898989',
            ],
            [
                'name' => 'PT SAPTA SARI TAMA',
                'address' => 'Kenali Asam Bawah, Kec. Kota Baru, Kota Jambi, Jambi 36128',
                'contact_person' => '074141453',
            ],
            [
                'name' => 'PT SIGRA DUTA MEDIKAL',
                'address' => 'Jl. Purnama, Suka Karya, Kec. Kota Baru, Kota Jambi, Jambi 36129',
                'contact_person' => '074141384',
            ],
            [
                'name' => 'PT SINDE',
                'address' => '-',
                'contact_person' => '-',
            ],
            [
                'name' => 'PT TEMPO SCAN JAMBI',
                'address' => 'Jl. Hayam Wuruk, Jelutung, Kec. Jelutung, Kota Jambi, Jambi 36124',
                'contact_person' => '074125484',
            ],
            [
                'name' => 'PT ZENA NIRMALA SENTOSA',
                'address' => '-',
                'contact_person' => '-',
            ],
            [
                'name' => 'PT ZOKKAS SEJAHTERA',
                'address' => 'Jl. Jend. A. Thalib No.2 Blok E, Simpang IV Sipin, Kec. Telanaipura, Kota Jambi, Jambi 36361',
                'contact_person' => '0741668263',
            ],
            [
                'name' => 'PT. SURYA SHARONE',
                'address' => '-',
                'contact_person' => '-',
            ],
            [
                'name' => 'UD CIPTA ANGSO DUO',
                'address' => 'Lrg. Marene No.104, Eka Jaya, Kec. Jambi Sel., Kota Jambi, Jambi 36134',
                'contact_person' => '0741570310',
            ],
        ]);
    }
}
