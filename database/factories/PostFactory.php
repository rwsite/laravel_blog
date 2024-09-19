<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'title'        => $title = $this->faker->sentence(2),
            'slug'         => Str::slug($title),
            'image'        => $this->faker->imageUrl(),
            'content'      => fake()->realText(rand(400, 500)),
            'published_by' => rand(1, 10),
        ];
    }
}
