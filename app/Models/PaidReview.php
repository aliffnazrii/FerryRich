<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_creator_id',
        'product_id',
        'deal_rate',
        'total_product',
        'order_status',
        'payment_status',
        'payment_date_advance',
        'payment_date_final',
        'shipment_tracking_number',
        'product_received',
        'receipt_photo',
    ];

    public function contentCreator()
    {
        return $this->belongsTo(User::class, 'content_creator_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function reviewSubmissions()
    {
        return $this->hasMany(ReviewSubmission::class, 'paid_review_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'paid_review_id');
    }
}
