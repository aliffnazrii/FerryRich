<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidReview extends Model
{
    use HasFactory;

    protected $table = 'paid_reviews';

    protected $fillable = [
        'content_creator_id',
        'product_id',
        'deal_rate',
        'total_product',
        'order_status',
        'payment_status',
        'payment_date_advance',
        'payment_date_final',
    ];

    public function contentCreator()
    {
        return $this->belongsTo(User::class, 'content_creator_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
