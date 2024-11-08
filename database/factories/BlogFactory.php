<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Blog::class;
    public function definition(): array
    {
        return [
            'user_id'=>User::factory(),
            'title'=>$this->faker->sentence(),
            'slug'=>$this->faker->slug(),
            'body'=>$this->faker->paragraph(),
            'image_path'=>$this->faker->imageUrl(640, 480,'blog','true','Faker'),
            'created_at'=>now(),
            'updated_at'=>now()

        ];
    }
}
