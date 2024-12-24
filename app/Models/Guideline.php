<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guideline extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id', // ID of the associated product
        'title',      // Title of the guideline
        'file_path',  // Path to the uploaded file
        'file_type',  // File type (e.g., pdf, docx, txt)
        'remark',     // Optional remark for the guideline
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
