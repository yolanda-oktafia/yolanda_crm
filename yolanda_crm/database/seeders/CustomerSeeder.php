<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;


class CustomerSeeder extends Seeder
{
    
    public function run(): void
    {
        Customer::insert([
            ['name' => 'Andi Wijaya', 'email' => 'andi@example.com', 'phone' => '081234111111', 'product_id' => 1],
            ['name' => 'Rina Dewi', 'email' => 'rina@example.com', 'phone' => '081234222222', 'product_id' => 2],
        ]);
    }
}
