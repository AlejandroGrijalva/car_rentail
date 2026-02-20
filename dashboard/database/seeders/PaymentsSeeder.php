<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            'rental_id' => 1,
            'amount' => 150.00,
            'payment_method' => 'credit_card',
            'transaction_id' => 'TXN123456789',
            'status' => 'completed',
            'payment_date' => now(),
            'created_at' => now()
        ]);
        $payment = new Payment();
        $payment->rental_id = 2;
        $payment->amount = 200.00;
        $payment->payment_method = 'paypal';
        $payment->transaction_id = 'TXN987654321';
        $payment->status = 'pending';
        $payment->payment_date = now();
    }
}
