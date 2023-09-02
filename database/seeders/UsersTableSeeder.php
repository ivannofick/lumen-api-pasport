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
                'phone_number' => '08989898989',
            ],
            [
                'name' => 'Yoga 1',
                'alamat' => 'betbe',
                'phone_number' => '08989898989',
            ],
            [
                'name' => 'didi 3',
                'alamat' => 'bsddsfds',
                'phone_number' => '08989898989',
            ],
            [
                'name' => 'kaka',
                'alamat' => 'ntebbeb',
                'phone_number' => '08989898989',
            ],
            [
                'name' => 'bolo',
                'alamat' => 'ouotyjytj',
                'phone_number' => '08989898989',
            ],
            [
                'name' => 'Yoga',
                'alamat' => 'skskdasdasdsadsadsa',
                'phone_number' => '08989898989',
            ],
        ];

        // Masukkan data ke dalam tabel 'users'
        DB::table('users')->insert($users);
    }
}
