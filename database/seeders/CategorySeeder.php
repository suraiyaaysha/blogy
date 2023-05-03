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
            'category_name' => 'Travel',
            'category_label' => 'Featured Category',
        ]);

        Category::create([
            'category_name' => 'Food',
            'category_label' => 'Top Category',
        ]);

        Category::create([
            'category_name' => 'Live Style',
            'category_label' => 'Summer Category',
        ]);

        Category::create([
            'category_name' => 'Fashion',
            'category_label' => 'Winter Category',
        ]);
    }
}
