<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            ['nom' => 'Informatique'],
            ['nom' => 'Papeterie'],
            ['nom' => 'Mobilier'],
        ]);
    }
} 