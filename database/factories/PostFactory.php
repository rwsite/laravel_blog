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
            'title'     => $title = fake()->name(),
            'slug'      => Str::slug( $title ),
            'thumbnail' => null,
            'content'   => fake()->text(),
        ];
    }
}
