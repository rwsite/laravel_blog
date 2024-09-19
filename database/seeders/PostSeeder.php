<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {

        Post::factory()
            ->count(50)
            ->create()
            ->each(function ($post) {
                // Привязываем посты к случайным категориям (пока к 1й категории)
                $categories = PostCategory::inRandomOrder()->take(rand(1, 1))->pluck('id');
                $post->categories()->attach($categories);
            });
    }
}
