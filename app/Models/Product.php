<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function paidReviews()
    {
        return $this->hasMany(PaidReview::class, 'product_id');
    }

    public function guidelines()
    {
        return $this->hasMany(ProductGuideline::class);
    }
}
