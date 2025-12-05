<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create([
            'program_id' => 11,
            'guide_id' => 1,
            'date' => '2025-11-05',
            'start_time' => '08:00:00',
            'end_time' => '10:00:00',
            'quota' => 10,
            'price_id' => 1,
        ]);

        Schedule::create([
            'program_id' => 12,
            'guide_id' => 2,
            'date' => '2025-11-06',
            'start_time' => '14:00:00',
            'end_time' => '17:00:00',
            'quota' => 15,
            'price_id' => 3,
        ]);

        Schedule::create([
            'program_id' => 13,
            'guide_id' => 3,
            'date' => '2025-11-07',
            'start_time' => '09:00:00',
            'end_time' => '11:00:00',
            'quota' => 8,
            'price_id' => 4,
        ]);

        Schedule::create([
            'program_id' => 14,
            'guide_id' => 4,
            'date' => '2025-11-08',
            'start_time' => '15:00:00',
            'end_time' => '18:00:00',
            'quota' => 12,
            'price_id' => 5,
        ]);

        Schedule::create([
            'program_id' => 15,
            'guide_id' => 4,
            'date' => '2025-11-08',
            'start_time' => '15:00:00',
            'end_time' => '18:00:00',
            'quota' => 12,
            'price_id' => 6,
        ]);
    }
}
