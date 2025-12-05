<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GuideSeeder::class,
            ProgramSeeder::class,
            RouteSeeder::class,
            PriceSeeder::class,
            ScheduleSeeder::class,
            UserSeeder::class,
            RegistrationSeeder::class,
            PaymentSeeder::class,
            FeedbackSeeder::class,
            NotificationSeeder::class,
        ]);
    }
}
