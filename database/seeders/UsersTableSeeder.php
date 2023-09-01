<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Contoh data pengguna
        $users = [
            [
                'name' => 'Yoga',
                'alamat' => 'skskdasdasdsadsadsa',
            ],
            [
                'name' => 'Yoga 1',
                'alamat' => 'betbe',
            ],
            [
                'name' => 'didi 3',
                'alamat' => 'bsddsfds',
            ],
            [
                'name' => 'kaka',
                'alamat' => 'ntebbeb',
            ],
            [
                'name' => 'bolo',
                'alamat' => 'ouotyjytj',
            ],
            [
                'name' => 'Yoga',
                'alamat' => 'skskdasdasdsadsadsa',
            ],
        ];

        // Masukkan data ke dalam tabel 'users'
        DB::table('users')->insert($users);
    }
}
