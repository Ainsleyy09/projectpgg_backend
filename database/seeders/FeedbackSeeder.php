<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feedback::create([
            'user_id' => 1,
            'rating' => 5,
            'comments' => 'Pengalaman tur yang luar biasa! Pemandunya ramah dan informatif.',
        ]);

        Feedback::create([
            'user_id' => 2,
            'rating' => 4,
            'comments' => 'Rute menarik dan mudah diikuti, tapi sedikit panas di siang hari',
        ]);

        Feedback::create([
            'user_id' => 3,
            'rating' => 5,
            'comments' => 'Sangat direkomendasikan untuk wisata sejarah di Palembang!',
        ]);
    }
}
