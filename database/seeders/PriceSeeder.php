<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Price::create([
            'program_id' => '11',
            'price' => 75000,
            'description' => '(Paket Ketek PP, Tour Guide, Kopi Agampisan)',
        ]);

        Price::create([
            'program_id' => '11',
            'price' => 115000,
            'description' => '(Paket Ketek PP, Tour Guide, Kopi Agampisan, makan siang by Agampisan)',
        ]);

        Price::create([
            'program_id' => '12',
            'price' => 90000,
            'description' => '(Paket Tour Guide, fotografer profesional, Kopi Nagara, Bear Brick)',
        ]);

        Price::create([
            'program_id' => '13',
            'price' => 168000,
            'description' => '(Paket our Guide, Profesional Artist, Merchandise, Sketchbook Accordion, Alat & Bahan Watercolor)',
        ]);

        Price::create([
            'program_id' => '14',
            'price' => 0,
            'description' => '(Gratis)',
        ]);

        Price::create([
            'program_id' => '15',
            'price' => 85000,
            'description' => '(Paket Tour Guide, Kapal Ketek PP, Makanan spesial Chinese, Tiket Masuk Tempat Wisata)',
        ]);
    }
}
