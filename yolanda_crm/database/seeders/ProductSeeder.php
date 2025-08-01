<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    
    public function run(): void
    {
        Product::create([
            'name' => 'Internet Premium 100Mbps',
            'description' => 'Layanan internet super cepat untuk bisnis.',
            'price' => 550000,
            'category' => 'Internet Bisnis',
            'status' => 'Aktif',
        ]);

        Product::create([
            'name' => 'Internet Personal 50Mbps',
            'description' => 'Layanan internet untuk kebutuhan rumah tangga.',
            'price' => 250000,
            'category' => 'Internet Personal',
            'status' => 'Aktif',
        ]);
    }
}
