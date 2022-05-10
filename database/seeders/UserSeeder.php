<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(5)
            ->has(Post::factory()->count(3)->has(Comment::factory()->count(3)))
            ->create();

        User::factory()
            ->count(5)
            ->noProfilePicture()
            ->has(Post::factory()->count(1)->has(Comment::factory()->count(2)))
            ->create();
    }
}
