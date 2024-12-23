<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['category_id' => 1, 'code' => 'P001', 'name' => 'Nastar Bulat', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '200000', 'price_sell' => '220000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P002', 'name' => 'Nastar Gulung', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '200000', 'price_sell' => '220000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P003', 'name' => 'Double Coklat Mede', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '200000', 'price_sell' => '220000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P004', 'name' => 'Bantal Guling', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '180000', 'price_sell' => '200000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P005', 'name' => 'Bulan Sabit Mede', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '200000', 'price_sell' => '220000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P006', 'name' => 'Bengbeng Milo', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '180000', 'price_sell' => '200000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P007', 'name' => 'Putri Salju Mede', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '160000', 'price_sell' => '180000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P008', 'name' => 'Kastangel Keju', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '160000', 'price_sell' => '180000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P009', 'name' => 'Jintan Susu Salju', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '160000', 'price_sell' => '180000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P010', 'name' => 'Stick Coklat', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '180000', 'price_sell' => '200000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P011', 'name' => 'Cornflakes', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '200000', 'price_sell' => '220000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P012', 'name' => 'Cornflake Coklas', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '200000', 'price_sell' => '220000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P013', 'name' => 'Sagu Keju', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '100000', 'price_sell' => '110000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P014', 'name' => 'Sagu Susu', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '100000', 'price_sell' => '110000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P015', 'name' => 'Bangkit Gula Merah', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '100000', 'price_sell' => '110000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P016', 'name' => 'Bangkit Gula Putih', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '100000', 'price_sell' => '110000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P017', 'name' => 'Lidah Kucing Vanila', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '140000', 'price_sell' => '150000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P018', 'name' => 'Lidah Kucing Nutela', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '180000', 'price_sell' => '200000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P019', 'name' => 'Vanilla Ring', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '90000', 'price_sell' => '100000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P020', 'name' => 'Boulu Nanas Cookies', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '130000', 'price_sell' => '140000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P021', 'name' => 'Kurma Kacang', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '150000', 'price_sell' => '160000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P022', 'name' => 'Kurma Wijen', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '150000', 'price_sell' => '160000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P023', 'name' => 'Mangkok Kismis', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '140000', 'price_sell' => '150000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P024', 'name' => 'Kue Donat', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '200000', 'price_sell' => '220000', 'unit' => '1KG'],
            ['category_id' => 1, 'code' => 'P025', 'name' => 'Almond London', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => '10', 'price_buy' => '200000', 'price_sell' => '220000', 'unit' => '1KG'],
            ['category_id' => 2, 'code' => 'LB001', 'name' => 'Lapis Legit 24x24 cm', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(300000, 429000), 'price_sell' => 430000, 'unit' => '1 pcs'],
            ['category_id' => 2, 'code' => 'LB002', 'name' => 'Lapis Legit 20x20 cm', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(200000, 329000), 'price_sell' => 330000, 'unit' => '1 pcs'],
            ['category_id' => 2, 'code' => 'LBK001', 'name' => 'Lapis Legit Keju 24x24 cm', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(400000, 469000), 'price_sell' => 470000, 'unit' => '1 pcs'],
            ['category_id' => 2, 'code' => 'LBK002', 'name' => 'Lapis Legit Keju 20x20 cm', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(300000, 369000), 'price_sell' => 370000, 'unit' => '1 pcs'],
            ['category_id' => 2, 'code' => 'LBP001', 'name' => 'Lapis Legit Prunes 24x24 cm', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(400000, 469000), 'price_sell' => 470000, 'unit' => '1 pcs'],
            ['category_id' => 2, 'code' => 'LBP002', 'name' => 'Lapis Legit Prunes 20x20 cm', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(300000, 369000), 'price_sell' => 370000, 'unit' => '1 pcs'],
            ['category_id' => 2, 'code' => 'LB-NANAS-24', 'name' => 'Lapis Legit Nanas 24x24 cm', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(250000, 299000), 'price_sell' => 300000, 'unit' => '1 pcs'],
            ['category_id' => 2, 'code' => 'LB-NANAS-20', 'name' => 'Lapis Legit Nanas 20x20 cm', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(200000, 249000), 'price_sell' => 250000, 'unit' => '1 pcs'],
            ['category_id' => 2, 'code' => 'LB-COLLATA-22', 'name' => 'Lapis Legit Coklat (Collata) 22x22 cm', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(400000, 469000), 'price_sell' => 470000, 'unit' => '1 pcs'],
            ['category_id' => 2, 'code' => 'LB-OVOMALTINE-24', 'name' => 'Lapis Legit Ovomaltine 24x24 cm', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(430000, 529000), 'price_sell' => 530000, 'unit' => '1 pcs'],
            ['category_id' => 2, 'code' => 'LB-SUSU-20', 'name' => 'Lapis Susu 20x20 cm', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(250000, 299000), 'price_sell' => 300000, 'unit' => '1 pcs'],
            ['category_id' => 2, 'code' => 'LB-MASUBA-24', 'name' => 'Lapis Masuba 24x24 cm', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(300000, 349000), 'price_sell' => 350000, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD001', 'name' => 'Boulu gulung (Slice)', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(3000, 3999), 'price_sell' => 4000, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD002', 'name' => 'Kue sus', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(2000, 2499), 'price_sell' => 2500, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD003', 'name' => 'Dadar gulung inti duren', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(2000, 2499), 'price_sell' => 2500, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD004', 'name' => 'Gabin Fla Susu', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(3000, 3499), 'price_sell' => 3500, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD005', 'name' => 'Pie buah', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(4000, 4499), 'price_sell' => 4500, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD006', 'name' => 'Srikaya ketan', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(2000, 2499), 'price_sell' => 2500, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD007', 'name' => 'Muso', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(2000, 2499), 'price_sell' => 2500, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD008', 'name' => 'Bolu cake (Slice)', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(3000, 3999), 'price_sell' => 4000, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD009', 'name' => 'Ketan duren', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(4000, 4999), 'price_sell' => 5000, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD010', 'name' => 'Pisang ijo', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(3000, 3999), 'price_sell' => 4000, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD011', 'name' => 'Brongko', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(4000, 4999), 'price_sell' => 5000, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD012', 'name' => 'Puding cup', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(4000, 4999), 'price_sell' => 5000, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD013', 'name' => 'Roti Panada', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(2000, 2999), 'price_sell' => 3000, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD014', 'name' => 'Karipap', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(3000, 3999), 'price_sell' => 4000, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD015', 'name' => 'Risol sayur', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(2000, 2499), 'price_sell' => 2500, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD016', 'name' => 'Risol ayam', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(3000, 3999), 'price_sell' => 4000, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD017', 'name' => 'Risol mayo', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(3000, 3999), 'price_sell' => 4000, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD018', 'name' => 'Lemper ayam', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(3000, 3499), 'price_sell' => 3500, 'unit' => '1 pcs'],
            ['category_id' => 3, 'code' => 'TRD019', 'name' => 'Lumpia', 'brand' => 'TOSERBA BY ZULFFF', 'stock' => rand(1, 100), 'price_buy' => rand(4000, 4999), 'price_sell' => 5000, 'unit' => '1 pcs'],  
        ]);
    }
}
