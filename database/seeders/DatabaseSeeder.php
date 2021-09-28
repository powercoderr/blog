<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            "name" => "Personal",
            "slug" => "personal"
        ]);

        $work = Category::create([
            "name" => "Work",
            "slug" => "work"
        ]);

        Post::create([
            "title" => "First Post",
            "slug" => "first-post",
            "category_id" => $personal->id,
            "user_id" => $user->id,
            "excerpt" => "First excerpt",
            "body"=> "First Body"
        ]);

        Post::create([
            "title" => "Second Post",
            "slug" => "second-post",
            "category_id" => $work->id,
            "user_id" => $user->id,
            "excerpt" => "Second excerpt",
            "body"=> "Second Body"
        ]);

    }
}
