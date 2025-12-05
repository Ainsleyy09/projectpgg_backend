<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Registration::create([
            'user_id' => 2,
            'schedule_id' => 1,
            'order_number' => "PGG-001",
            'name' => 'Siti Aisyah',
            'region' => 'Palembang',
            'phone' => '+6288287119881',
            'email' => 'ichacaa09@gmail.com',
            'instagram' => '@slcaa',
            'status' => 'menunggu',
        ]);

        Registration::create([
            'user_id' => 3,
            'schedule_id' => 2,
            'order_number' => "PGG-002",
            'name' => 'Tiara Cahya Maulizah Nabila',
            'region' => 'Jakarta',
            'phone' => '+6281281181417',
            'email' => 'nabillabillaa11@gmail.com',
            'instagram' => '@nbila11',
            'status' => 'menunggu',
        ]);

        Registration::create([
            'user_id' => 4,
            'schedule_id' => 3,
            'order_number' => "PGG-003",
            'name' => 'Muhammad Yogi Saputra',
            'region' => 'Bandung',
            'phone' => '+62895370648331',
            'email' => 'mhdyogisptra@gmail.com',
            'instagram' => '@deyogies',
            'status' => 'menunggu',
        ]);

        Registration::create([
            'user_id' => 5,
            'schedule_id' => 4,
            'order_number' => "PGG-004",
            'name' => 'Fadly Adriano Sianturi',
            'region' => 'Surabaya',
            'phone' => '+6285368108239',
            'email' => 'fadlyadriano@gmail.com',
            'instagram' => '@fadlyadriano',
            'status' => 'menunggu',
        ]);
    }
}
