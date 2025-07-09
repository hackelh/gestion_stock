<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $informatique = Category::where('nom', 'Informatique')->first();
        $papeterie = Category::where('nom', 'Papeterie')->first();

        Product::insert([
            [
                'nom' => 'Ordinateur portable',
                'reference' => 'PC-001',
                'description' => 'Portable 15 pouces',
                'prix' => 800.00,
                'stock' => 10,
                'seuil_minimum' => 3,
                'category_id' => $informatique?->id,
            ],
            [
                'nom' => 'Classeur A4',
                'reference' => 'PAP-001',
                'description' => 'Classeur cartonné',
                'prix' => 2.50,
                'stock' => 50,
                'seuil_minimum' => 10,
                'category_id' => $papeterie?->id,
            ],
        ]);
    }
} 