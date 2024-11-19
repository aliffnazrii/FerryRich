<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    public function run():void
    {
        Video::create([
            'file_path' => 'uploads/videos/video1.mp4',
            'uploaded_by' => 1,
            'status' => 'Pending',
        ]);

        Video::create([
            'file_path' => 'uploads/videos/video2.mp4',
            'uploaded_by' => 2,
            'status' => 'Approved',
        ]);

        Video::create([
            'file_path' => 'uploads/videos/video3.mp4',
            'uploaded_by' => 1,
            'status' => 'Rejected',
            'feedback' => 'The lighting in the video needs improvement.',
        ]);
    }
}
