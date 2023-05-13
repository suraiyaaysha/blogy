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
            'thumbnail' => 'frontend/assets/images/category-01.jpg',
            'is_featured' => true,
        ]);

        Category::create([
            'name' => 'Food',
            'slug' => 'food',
            'thumbnail' => 'frontend/assets/images/category-02.jpg',
            'is_featured' => true,
        ]);

        Category::create([
            'name' => 'Life Style',
            'slug' => 'life-style',
            'thumbnail' => 'frontend/assets/images/category-03.jpg',
            'is_featured' => true,
        ]);

        Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion',
            'thumbnail' => 'frontend/assets/images/category-01.jpg',
            'is_featured' => true,
        ]);

        Category::create([
            'name' => 'Women',
            'slug' => 'women',
            'thumbnail' => 'frontend/assets/images/category-02.jpg',
            'is_featured' => false,
        ]);
    }
}
