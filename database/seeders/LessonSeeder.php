<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i = 1;
        $j = 1;
        while ($i <= 10) {
            $next = ++$j;
            if ($i >= 10) {
                $next = null;
            }
            \App\Models\Lesson::factory()->create([
                'id' => $i++,
                'course_id' => 1,
                'next_lesson' => $next,
            ]);
        }

        $i = 11;
        $j = 11;
        while ($i <= 20) {
            $next = ++$j;
            if ($i >= 20) {
                $next = null;
            }
            \App\Models\Lesson::factory()->create([
                'id' => $i++,
                'course_id' => 2,
                'next_lesson' => $next,
            ]);
        }
    }
}
