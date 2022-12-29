<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users = [
        [
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'gambar' => 'logo.png',
            'password' => bcrypt('12345678'),
            'remember_token' => null,
        ],
        [
            'username' => 'rahmalia',
            'email' => '203040084@mail.unpas.ac.id',
            'gambar' => 'rahma.png',
            'password' => bcrypt('12345678'),
            'remember_token' => null,
        ],
        [
            'username' => 'hamzah',
            'email' => '203040087@mail.unpas.ac.id',
            'gambar' => 'hamzah.png',
            'password' => bcrypt('12345678'),
            'remember_token' => null,
        ],
        [
            'username' => 'farhan',
            'email' => '203040085@mail.unpas.ac.id',
            'gambar' => 'farhan.jpg',
            'password' => bcrypt('12345678'),
            'remember_token' => null,
        ],
        [
            'username' => 'surya',
            'email' => '203040065@mail.unpas.ac.id',
            'gambar' => 'surya.png',
            'password' => bcrypt('12345678'),
            'remember_token' => null,
        ]
        ];
        User::insert($users);
    }
}
