<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            ['name' => 'OnePlus Mobile','price' => 20,'created_at'=>now()],
            ['name' => 'Sumsung S3', 'price' => 45,'created_at'=>now()],
            ['name' => 'Iphone', 'price' => 70,'created_at'=>now()],
            ['name' => 'LCD', 'price' => 80,'created_at'=>now()],
            ['name' => 'Dell Laptop ', 'price' => 85,'created_at'=>now()],
            ['name' => 'HP laptop ', 'price' => 90,'created_at'=>now()],
        ]);
    }
}
