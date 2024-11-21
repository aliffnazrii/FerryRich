<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'paid_review_id',
        'video_id',
        'post_date',
        'video_link',

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
