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
                'name' => 'sepatu',
                'stocks' => 1000,
            ],
            [
                'name' => 'sandal',
                'stocks' => 50,
            ],
            [
                'name' => 'kaus kaki',
                'stocks' => 50,
            ],
        ];

        // Masukkan data ke dalam tabel 'users'
        DB::table('products')->insert($users);
    }
}
