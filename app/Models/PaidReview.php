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
        'video_id',
        'deal_rate',
        'total_product',
        'order_status',
        'payment_status',
        'shipment_tracking_number',
        'product_received',
        'receipt_photo',
        'validation',
    ];

    public function contentCreator()
    {
        return $this->belongsTo(User::class, 'content_creator_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function payments()
    {
        return $this->hasMany(Payment::class, 'paid_review_id');
    }
    
    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
