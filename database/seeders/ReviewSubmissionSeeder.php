<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReviewSubmission;

class ReviewSubmissionSeeder extends Seeder
{
    public function run():void
    {
        ReviewSubmission::create([
            'paid_review_id' => 1,
            'video_id' => 1,
            'link_video_tiktok' => 'https://www.tiktok.com/@user1/video/12345',
        ]);

        ReviewSubmission::create([
            'paid_review_id' => 2,
            'video_id' => 2,
            'link_video_tiktok' => 'https://www.tiktok.com/@user2/video/67890',
        ]);

        ReviewSubmission::create([
            'paid_review_id' => 3,
            'video_id' => 3,
            'link_video_tiktok' => 'https://www.tiktok.com/@user1/video/13579',
        ]);
    }
}
