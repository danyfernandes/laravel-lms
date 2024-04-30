<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courses = Course::all()->pluck('id')->toArray();
        $lessons = Lesson::all()->pluck('id')->toArray();
        return [
            'title' => fake()->sentence(),
            'content' => fake()->randomHtml(),
            'course_id' => fake()->randomElement($courses),
            'duration' => fake()->time('i'),
            'next_lesson' => fake()->randomElement($lessons),
        ];
    }
}
