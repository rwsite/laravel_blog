<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(15)->create();
        $this->command->info('Таблица пользователей загружена данными!');

        $this->call(PostCategorySeeder::class);
        $this->command->info('Таблица категорий загружена данными!');

        $this->call( PostSeeder::class );
        $this->command->info('Таблица постов загружена данными!');

        $this->call(CommentSeeder::class);
        $this->command->info('Таблица комментариев загружена данными!');
    }
}
