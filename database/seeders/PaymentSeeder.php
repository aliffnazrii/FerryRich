<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    public function run():void
    {
        Payment::create([
            'paid_review_id' => 1,
            'amount' => 100,
            'reference_number' => 'PAY12345',
            'status' => 'Pending',
        ]);

        Payment::create([
            'paid_review_id' => 2,
            'amount' => 150,
            'reference_number' => 'PAY67890',
            'status' => 'Completed',
        ]);

        Payment::create([
            'paid_review_id' => 3,
            'amount' => 200,
            'reference_number' => 'PAY13579',
            'status' => 'Completed',
        ]);
    }
}
