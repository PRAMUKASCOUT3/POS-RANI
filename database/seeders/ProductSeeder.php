<?php

namespace Database\Seeders;

use App\Models\Product;
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
        $lastKode = Product::max('code');
        $lastNumber = $lastKode ? intval(substr($lastKode, 2)) : 0;
        $product =[
            [
                'category_id' => 1,
                'name' => 'Nastar Bulat',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '200000',
                'price_sell' => '220000',
                'unit' => 'Kg',
                'weight' => '1000', 
                'price_kg' => '22000'
            ],
            [
                'category_id' => 1,
                'name' => 'Nastar Gulung',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '200000',
                'price_sell' => '220000',
                'unit' => 'Kg',
                'weight' => '1000', 
                'price_kg' =>'22000'
            ],
            [
                'category_id' => 1,
                'name' => 'Double Coklat Mede',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '200000',
                'price_sell' => '220000',
                'unit' => 'Kg',
                'weight' => '1000', 
                'price_kg' =>'22000'
            ],
            [
                'category_id' => 1,
                'name' => 'Bantal Guling',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '180000',
                'price_sell' => '200000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '20000'
            ],
            [
                'category_id' => 1,
                'name' => 'Bulan Sabit Mede',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '200000',
                'price_sell' => '220000',
                'unit' => 'Kg',
                'weight' => '1000', 
                'price_kg' =>'22000'
            ],
            [
                'category_id' => 1,
                'name' => 'Bengbeng Milo',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '180000',
                'price_sell' => '200000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '20000'
            ],
            [
                'category_id' => 1,
                'name' => 'Putri Salju Mede',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '160000',
                'price_sell' => '180000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '18000'
            ],
            [
                'category_id' => 1,
                'name' => 'Kastangel Keju',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '160000',
                'price_sell' => '180000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '18000'
            ],
            [
                'category_id' => 1,
                'name' => 'Jintan Susu Salju',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '160000',
                'price_sell' => '180000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '18000'
            ],
            [
                'category_id' => 1,
                'name' => 'Stick Coklat',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '180000',
                'price_sell' => '200000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '20000'
            ],
            [
                'category_id' => 1,
                'name' => 'Cornflakes',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '200000',
                'price_sell' => '220000',
                'unit' => 'Kg',
                'weight' => '1000', 
                'price_kg' =>'22000'
            ],
            [
                'category_id' => 1,
                'name' => 'Cornflake Coklas',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '200000',
                'price_sell' => '220000',
                'unit' => 'Kg',
                'weight' => '1000', 
                'price_kg' =>'22000'
            ],
            [
                'category_id' => 1,
                'name' => 'Sagu Keju',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '100000',
                'price_sell' => '110000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '11000'
            ],
            [
                'category_id' => 1,
                'name' => 'Sagu Susu',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '100000',
                'price_sell' => '110000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '11000'
            ],
            [
                'category_id' => 1,
                'name' => 'Bangkit Gula Merah',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '100000',
                'price_sell' => '110000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '11000'
            ],
            [
                'category_id' => 1,
                'name' => 'Bangkit Gula Putih',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '100000',
                'price_sell' => '110000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '11000'
            ],
            [
                'category_id' => 1,
                'name' => 'Lidah Kucing Vanila',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '140000',
                'price_sell' => '150000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '15000'
            ],
            [
                'category_id' => 1,
                'name' => 'Lidah Kucing Nutela',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '180000',
                'price_sell' => '200000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '20000'
            ],
            [
                'category_id' => 1,
                'name' => 'Vanilla Ring',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '90000',
                'price_sell' => '100000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '10000'
            ],
            [
                'category_id' => 1,
                'name' => 'Boulu Nanas Cookies',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '130000',
                'price_sell' => '140000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '14000'
            ],
            [
                'category_id' => 1,
                'name' => 'Kurma Kacang',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '150000',
                'price_sell' => '160000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '16000'
            ],
            [
                'category_id' => 1,
                'name' => 'Kurma Wijen',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '150000',
                'price_sell' => '160000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '16000'
            ],
            [
                'category_id' => 1,
                'name' => 'Mangkok Kismis',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '140000',
                'price_sell' => '150000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '15000'
            ],
            [
                'category_id' => 1,
                'name' => 'Kue Donat',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '200000',
                'price_sell' => '220000',
                'unit' => 'Kg',
                'weight' => '1000', 
                'price_kg' =>'22000'
            ],
            [
                'category_id' => 1,
                'name' => 'Almond London',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '10',
                'price_buy' => '200000',
                'price_sell' => '220000',
                'unit' => 'Kg',
                'weight' => '1000', 
                'price_kg' =>'22000'
            ],
            [
                'category_id' => 2,
                'name' => 'Lapis Legit 24x24 cm',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '400000',
                'price_sell' => '430000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '43000'
            ],
            [
                'category_id' => 2,
                'name' => 'Lapis Legit 20x20 cm',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '300000',
                'price_sell' => '330000',
                'unit' => 'Kg',
                'weight' => '1000', 
                'price_kg' =>'33000'
            ],
            [
                'category_id' => 2,
                'name' => 'Lapis Legit Keju 24x24 cm',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '450000',
                'price_sell' => '470000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '47000'
            ],
            [
                'category_id' => 2,
                'name' => 'Lapis Legit Keju 20x20 cm',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '350000',
                'price_sell' => '370000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '37000'
            ],
            [
                'category_id' => 2,
                'name' => 'Lapis Legit Prunes 24x24 cm',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '450000',
                'price_sell' => '470000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '47000'
            ],
            [
                'category_id' => 2,
                'name' => 'Lapis Legit Prunes 20x20 cm',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '350000',
                'price_sell' => '370000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '37000'
            ],
            [
                'category_id' => 2,
                'name' => 'Lapis Legit Nanas 24x24 cm',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '280000',
                'price_sell' => '300000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '30000'
            ],
            [
                'category_id' => 2,
                'name' => 'Lapis Legit Nanas 20x20 cm',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '230000',
                'price_sell' => '250000',
                'unit' => 'Kg',
                'weight' => '1000', 
                'price_kg' => '25000'
            ],
            [
                'category_id' => 2,
                'name' => 'Lapis Legit Coklat (Collata) 22x22 cm',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '450000',
                'price_sell' => '470000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '47000'
            ],
            [
                'category_id' => 2,
                'name' => 'Lapis Legit Ovomaltine 24x24 cm',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '500000',
                'price_sell' => '530000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '53000'
            ],
            [
                'category_id' => 2,
                'name' => 'Lapis Susu 20x20 cm',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '280000',
                'price_sell' => '300000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '30000'
            ],
            [
                'category_id' => 2,
                'name' => 'Lapis Masuba 24x24 cm',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '330000',
                'price_sell' => '350000',
                'unit' => 'Kg',
                'weight' => '1000',
                'price_kg' => '35000'
            ],
            [
                'category_id' => 3,
                'name' => 'Boulu gulung (Slice)',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '3500',
                'price_sell' => '4000',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Kue sus',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '2000',
                'price_sell' => '2500',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Dadar gulung inti duren',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '2000',
                'price_sell' => '2500',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Gabin Fla Susu',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '3000',
                'price_sell' => '3500',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Pie buah',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '4000',
                'price_sell' => '4500',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Srikaya ketan',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '2000',
                'price_sell' => '2500',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Muso',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '2000',
                'price_sell' => '2500',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Bolu cake (Slice)',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '3500',
                'price_sell' => '4000',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Ketan duren',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '4500',
                'price_sell' => '5000',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Pisang ijo',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '3500',
                'price_sell' => '4000',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Brongko',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '4500',
                'price_sell' => '5000',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Puding cup',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '4500',
                'price_sell' => '5000',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Roti Panada',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '2500',
                'price_sell' => '3000',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Karipap',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '3500',
                'price_sell' => '4000',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Risol sayur',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '2000',
                'price_sell' => '2500',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Risol ayam',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '3500',
                'price_sell' => '4000',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Risol mayo',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '3500',
                'price_sell' => '4000',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Lemper ayam',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '3000',
                'price_sell' => '3500',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
            [
                'category_id' => 3,
                'name' => 'Lumpia',
                'brand' => 'TOSERBA BY ZULFFF',
                'stock' => '20',
                'price_buy' => '4500',
                'price_sell' => '5000',
                'unit' => 'Pcs',
                'weight' => '1000',
                'price_kg' => '0'
            ],
        ];
        foreach ($product as $items){
            $lastNumber++;
            $product['code'] = 'BR' .str_pad($lastNumber,4,'0',STR_PAD_LEFT);

            Product::create($items);
        }
    }
}
