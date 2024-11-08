<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users=User::all();
        $blogs=Blog::all();

        $blogs->each(function ($blog) use ($users) {

            for ($i=0; $i<5; $i++) {
                Comment::factory()->create([
                    'blog_id' => $blog->id,
                    'user_id' => $users->random()->id,
                ]);
            }
        });
    }
}
