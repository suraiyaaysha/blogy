<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Travel',
            'slug' => 'travel',
            'is_featured' => true,
        ]);

        Category::create([
            'name' => 'Food',
            'slug' => 'food',
            'is_featured' => true,
        ]);

        Category::create([
            'name' => 'Life Style',
            'slug' => 'life-style',
            'is_featured' => true,
        ]);

        Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion',
            'is_featured' => true,
        ]);

        Category::create([
            'name' => 'Women',
            'slug' => 'women',
            'is_featured' => false,
        ]);
    }
}
