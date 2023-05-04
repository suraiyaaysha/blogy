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
            'label' => 'Featured Category',
        ]);

        Category::create([
            'name' => 'Food',
            'slug' => 'food',
            'label' => 'Top Category',
        ]);

        Category::create([
            'name' => 'Life Style',
            'slug' => 'life-style',
            'label' => 'Summer Category',
        ]);

        Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion',
            'label' => 'Winter Category',
        ]);
    }
}
