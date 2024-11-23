<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGuideline extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'guideline_type',
        'guideline_path',
    ];

    /**
     * Get the product that owns the guideline.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}