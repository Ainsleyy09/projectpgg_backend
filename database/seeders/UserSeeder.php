<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin PGG',
            'email' => 'tespalembanggoodguide@gmail.com',
            'password' => bcrypt('pgg001'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Siti Aisyah',
            'email' => 'ichacaa09@gmail.com',
            'password' => bcrypt('customer001'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Tiara Cahya Maulizah Nabila',
            'email' => 'nabillabillaa11@gmail.com',
            'password' => bcrypt('customer001'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Muhammad Yogi Saputra',
            'email' => 'mhdyogisptra@gmail.com',
            'password' => bcrypt('customer001'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Fadly Adriano Sianturi',
            'email' => 'fadlyadriano@gmail.com',
            'password' => bcrypt('customer001'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Anisya',
            'email' => 'anisyania56@gmail.com',
            'password' => bcrypt('customer001'),
            'role' => 'user',
        ]);
    }
}
