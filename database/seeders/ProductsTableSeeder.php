<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Contoh data pengguna
        $users = [
            [
                'name' => 'Parfum Pink',
                'price' => 6000,
                'image' => 'parfum.svg',
                'stocks' => 1000,
                'production_date' => strtotime(date('Y-m-d H:i:s'))
            ],
            [
                'name' => 'Parfum Item',
                'price' => 30000,
                'image' => 'parfum-item.svg',
                'stocks' => 1000,
                'production_date' => strtotime(date('Y-m-d H:i:s'))
            ],
            [
                'name' => 'Parfum Pinks',
                'price' => 560000,
                'image' => 'parfum.svg',
                'stocks' => 1000,
                'production_date' => strtotime(date('Y-m-d H:i:s'))
            ],
            [
                'name' => 'Parfum Pinks',
                'price' => 560000,
                'image' => 'parfum.svg',
                'stocks' => 1000,
                'production_date' => strtotime(date('Y-m-d H:i:s'))
            ],
            [
                'name' => 'Parfum warna Pinks',
                'price' => 50000,
                'image' => 'parfum.svg',
                'stocks' => 1000,
                'production_date' => strtotime(date('Y-m-d H:i:s'))
            ],
            [
                'name' => 'Parfum gasdas Pinks',
                'price' => 560000,
                'image' => 'parfum.svg',
                'stocks' => 1000,
                'production_date' => strtotime(date('Y-m-d H:i:s'))
            ],
        ];

        // Masukkan data ke dalam tabel 'users'
        DB::table('products')->insert($users);
    }
}
