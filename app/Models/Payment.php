<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'paid_review_id',
        'amount',
        'reference_number',
        'status',
    ];

    public function paidReview()
    {
        return $this->belongsTo(PaidReview::class, 'paid_review_id');
    }
}
