<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;
use App\Models\User;

class LeadSeeder extends Seeder
{
    public function run(): void
    {
        $salesUser = User::where('email', 'admin@example.com')->first();

        if ($salesUser) {
            Lead::create([
                'name' => 'Budi Santoso',
                'email' => 'budi.s@example.com',
                'phone' => '081234567890',
                'status' => 'Baru',
                'source' => 'Website',
                'notes' => 'Tertarik dengan paket bisnis.',
                'user_id' => $salesUser->id, 
            ]);

            Lead::create([
                'name' => 'Siti Aminah',
                'email' => 'siti.a@example.com',
                'phone' => '089876543210',
                'status' => 'Dihubungi',
                'source' => 'Telepon',
                'notes' => 'Meminta penawaran untuk paket personal.',
                'user_id' => $salesUser->id, 
            ]);
        }
    }
}
