<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Lead;
use App\Models\Product;
use App\Models\User;

class ProjectSeeder extends Seeder
{
  
    public function run(): void
    {
        $lead = Lead::where('email', 'budi.s@example.com')->first();
        $salesUser = User::where('email', 'yolanda@gmail.com')->first();
        $product = Product::first(); 

        if ($lead && $salesUser && $product) {
            $project = Project::create([
                'title' => 'Implementasi Internet Bisnis untuk Budi Santoso',
                'lead_id' => $lead->id,
                'user_id' => $salesUser->id,
                'status' => 'Disetujui',
                'notes' => 'Klien meminta pemasangan minggu depan.',
                'value' => $product->price, 
            ]);

            $project->products()->attach($product->id, [
                'quantity' => 1,
                'price' => $product->price,
            ]);
        }
    }
}
