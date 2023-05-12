<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Post::class;

    public function definition(): array
    {
        $category = Category::inRandomOrder()->first(); //Get a random category
        $user = User::inRandomOrder()->first(); //Get a random user_id

        return [
            // 'category_id' => $this->faker->numberBetween(1, 10),
            'category_id' => $category->id,
            // 'user_id' => $user->id,
            'user_id' => $user->id,
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(),
            'thumbnail' => $this->faker->imageUrl(),
            'details' => $this->faker->paragraphs(3, true),
            'reading_duration' => $this->faker->randomNumber(2) . 'min',
            'views' => $this->faker->randomNumber(2)
        ];
    }
}
