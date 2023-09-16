<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => Hash::make('123'),
                'email' => 'qwerty@gmail.com',
                'nama_petugas' => 'Ashar',
                'level' => 'Admin',
            ],
            [
                'username' => 'petugas',
                'password' => Hash::make('123'),
                'email' => 'abcde@gmail.com',
                'nama_petugas' => 'Farhan',
                'level' => 'Petugas',
            ],
            [
                'username' => 'mas 1',
                'password' => Hash::make('123'),
                'email' => '12345@gmail.com',
                'nama_petugas' => 'Dika',
                'level' => 'Masyarakat',
            ]
        ];

        User::insert($data);
    }
}
