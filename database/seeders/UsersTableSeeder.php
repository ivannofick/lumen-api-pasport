<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $password= 123;
        $hashPassword = Hash::make($password);
        // Contoh data pengguna
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'phone_number' => '08989898989',
                'password' => $hashPassword,
                'status'=>1,
                'roles' => 1
            ]
        ];

        // Masukkan data ke dalam tabel 'users'
        DB::table('users')->insert($users);
    }
}
