<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'=> 'Food',
                'slug'=> 'food',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=> 'Fashion',
                'slug'=> 'fashion',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=> 'Photography',
                'slug'=> 'photography',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=> 'Beauty',
                'slug'=> 'beauty',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=> 'Travel',
                'slug'=> 'travel',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Tag::insert($data);
    }
}
