<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostCategory::factory()
            ->count(20)
            ->create()
            ->each(function ($category) {
                // Создаем дочерние категории
                if (Factory::create()->boolean(50)) {
                    $category->children()->saveMany(PostCategory::factory()->count(3)->make(['parent_id' => $category->id]));
                }
            });
    }
}
