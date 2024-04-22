<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6, false),
            'description' => fake()->sentence(20),
            'image_path' => 'https://source.unsplash.com/random',
            'slug' => fake()->slug(),
            'price' => fake()->buildingNumber(),
            'level' => 'Beginner',
            'status' => 'enabled',
            'audio' => 'English',
            'subtitles' => 'English, German, Italian, Spanish',
        ];
    }
}
