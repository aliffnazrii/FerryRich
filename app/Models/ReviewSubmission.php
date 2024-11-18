<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewSubmission extends Model
{
    use HasFactory;


    protected $table = 'review_submissions';

    protected $fillable = [
        'paid_review_id',
        'video_id',
        'post_date',
        'link_video_tiktok',
        'link_video_google',
    ];

    public function paidReview()
    {
        return $this->belongsTo(PaidReview::class, 'paid_review_id');
    }

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }
}
