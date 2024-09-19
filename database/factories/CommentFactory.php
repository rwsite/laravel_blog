<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id'      => rand(1, 30),
            'content'      => fake()->text(),
            'created_at'   => fake()->dateTimeBetween('-200 days', '-50 days'),
            'updated_at'   => fake()->dateTimeBetween('-40 days', '-1 days'),
            'published_by' => rand(1, 3), // супер-админ или просто админ
        ];
    }
}
