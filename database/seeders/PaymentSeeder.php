<?php

namespace Database\Seeders;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        Payment::create([
            'registration_id' => 1,
            'order_id' => 'ORDER-001',
            'amount' => 150000,
            'payment_method' => 'Midtrans QRIS',
            'transaction_id' => 'TRX001',
            'payment_date' => Carbon::now(),
            'status' => 'pending',
        ]);

        Payment::create([
            'registration_id' => 2,
            'order_id' => 'ORDER-002',
            'amount' => 200000,
            'payment_method' => 'Bank Transfer',
            'transaction_id' => 'TRX002',
            'payment_date' => Carbon::now()->subDays(1),
            'status' => 'success',
        ]);

        Payment::create([
            'registration_id' => 3,
            'order_id' => 'ORDER-003',
            'amount' => 180000,
            'payment_method' => 'Midtrans DANA',
            'transaction_id' => 'TRX003',
            'payment_date' => Carbon::now()->subDays(2),
            'status' => 'success',
        ]);

        Payment::create([
            'registration_id' => 4,
            'order_id' => 'ORDER-004',
            'amount' => 150000,
            'payment_method' => 'Bank Transfer',
            'transaction_id' => 'TRX004',
            'payment_date' => Carbon::now()->subDays(3),
            'status' => 'failed',
        ]);
    }
}
