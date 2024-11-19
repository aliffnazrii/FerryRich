<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run():void
    {
        Product::create([
            'name' => 'Badang Cleaner',
            'description' => 'A powerful multipurpose cleaner.',
            'price' => 20,
        ]);

        Product::create([
            'name' => 'Makeover Spray',
            'description' => 'A refreshing spray for furniture.',
            'price' => 15,
        ]);

        Product::create([
            'name' => 'Bathroom Cleaner',
            'description' => 'An efficient cleaner for bathrooms.',
            'price' => 25,
        ]);
    }
}
