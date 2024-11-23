<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaidReview;

class PaidReviewSeeder extends Seeder
{
    public function run():void
    {
        PaidReview::create([
            'content_creator_id' => 1,
            'product_id' => 1,
            'deal_rate' => 100,
            'total_product' => 1,
            'order_status' => 'Pending',
            'payment_status' => 'Pending',
            'video_id' => 1,
        ]);

        PaidReview::create([
            'content_creator_id' => 1,
            'product_id' => 2,
            'deal_rate' => 150,
            'total_product' => 2,
            'order_status' => 'Delivered',
            'payment_status' => 'Pending',
            'video_id' => 1,
        ]);

        PaidReview::create([
            'content_creator_id' => 2,
            'product_id' => 3,
            'deal_rate' => 200,
            'total_product' => 1,
            'order_status' => 'Delivered',
            'payment_status' => 'Paid',
            'video_id' => 1,
        ]);
    }
}
