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
                'nama_petugas' => 'Admin',
                'level' => 'Admin',
            ],
            [
                'username' => 'petugas',
                'password' => Hash::make('123'),
                'nama_petugas' => 'Petugas',
                'level' => 'Petugas',
            ],
            [
                'username' => 'siswa',
                'password' => Hash::make('123'),
                'nama_petugas' => 'Siswa',
                'level' => 'Siswa',
            ]
        ];

        User::insert($data);
    }
}