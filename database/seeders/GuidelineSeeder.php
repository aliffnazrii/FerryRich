<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guideline;

class GuidelineSeeder extends Seeder
{
    public function run():void
    {
        Guideline::create([
            'product_id' => 1,
            'description' => 'Use this product for general cleaning tasks.',
            'file_path' => 'uploads/guidelines/badang_cleaner.pdf',
        ]);

        Guideline::create([
            'product_id' => 2,
            'description' => 'Apply this spray on wooden furniture.',
            'file_path' => 'uploads/guidelines/makeover_spray.pdf',
        ]);

        Guideline::create([
            'product_id' => 3,
            'description' => 'Clean tiles and bathrooms with this product.',
            'file_path' => 'uploads/guidelines/bathroom_cleaner.pdf',
        ]);
    }
}
