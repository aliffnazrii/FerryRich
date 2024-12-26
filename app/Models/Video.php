<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'uploaded_by',
        'upload_date',
        'video_link',
        'ad_code', // for ads
        'status',
        'validate',
        'reviewed_by',
        'reviewed_at',
        'feedback',
    ];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }



    public function paidReviews()
{
    return $this->hasMany(PaidReview::class);
}
}
