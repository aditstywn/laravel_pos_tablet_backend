<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discount::create([
            'name' => 'Hari Raya',
            'description' => 'Buat THR',
            'type' => 'percentage',
            'value' => 50,
            'status' => 'active',
            'expired_date' => '2024-07-20'
        ]);
        Discount::create([
            'name' => 'Welcome To As',
            'description' => 'Member Baru',
            'type' => 'percentage',
            'value' => 20,
            'status' => 'active',
            'expired_date' => '2024-08-17'
        ]);
    }
}
