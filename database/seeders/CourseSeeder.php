<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Course::factory()->create([
            'title' => 'Adventure Photography: Capturing Wonders Of Nature',
            'description' => '<div class="p-6">
            <h2 class="text-2xl font-bold mb-4">Adventure Photography: Capturing Wonders Of Nature</h2>
            <p class="text-gray-700 mb-4">Immerse yourself in the captivating world of Adventure Photography, where every click of the shutter brings you closer to the heart of nature\'s majesty. In this exhilarating course, you will learn the art and science of capturing breathtaking landscapes, wildlife, and outdoor adventures through the lens of your camera.</p>
            <p class="text-gray-700 mb-4">From serene sunsets to rugged mountain peaks, you will discover the secrets to composing compelling shots that tell stories and evoke emotions. Led by seasoned wilderness photographers, you will venture into the great outdoors, honing your skills amidst stunning vistas and diverse ecosystems.</p>
            <p class="text-gray-700 mb-4">Through a combination of interactive lessons and field expeditions, you will master essential techniques such as composition, lighting, and exposure. Whether you are a beginner looking to take your first steps in photography or an experienced shutterbug seeking to refine your craft, this course offers something for every level of enthusiast.</p>
            <p class="text-gray-700 mb-4">By the end of the journey, you will not only have a portfolio brimming with stunning images but also a newfound appreciation for the beauty and diversity of the natural world. Embark on your photographic adventure today and let your creativity soar to new heights!</p>
        </div>
        ',
            'image_path' => '/images/courses/adventure-photography-capturing-natures-wonders/adventure_photography.jpg',
            'slug' => 'adventure-photography-capturing-natures-wonders',
            'price' => '99.99',
            'level' => 'Intermediate',
            'status' => 'enabled',
            'audio' => 'English',
            'subtitles' => 'Italian, English, Spanish',
            'access' => '3 months',
        ]);

        \App\Models\Course::factory()->create([
            'title' => 'Culinary Creativity: Exploring Global Flavors',
            'description' => '<div class="p-6">
                <h2 class="text-2xl font-bold mb-4">Culinary Creativity: Exploring Global Flavors</h2>
                <p class="text-gray-700 mb-4">Embark on a gastronomic journey around the world with our Culinary Creativity course. Dive into the rich tapestry of global cuisines as you learn to create mouthwatering dishes that tantalize the taste buds and awaken your culinary imagination.</p>
                <p class="text-gray-700 mb-4">From the fiery spices of India to the delicate flavors of Japan, this course will expand your culinary repertoire and inspire your inner chef. Led by seasoned culinary experts, you will explore a diverse array of ingredients, techniques, and cultural traditions.</p>
                <p class="text-gray-700 mb-4">Through a blend of hands-on cooking classes and in-depth cultural insights, you will master the art of crafting authentic dishes that reflect the essence of each region. Whether you are a novice cook or a seasoned kitchen veteran, there is something for everyone in this flavorful adventure.</p>
                <p class="text-gray-700 mb-4">By the end of the course, you will not only have a repertoire of delicious recipes but also a deeper appreciation for the culinary diversity that unites us all. Join us on a culinary odyssey and unlock the secrets of global gastronomy!</p>
            </div>',
            'image_path' => '/images/courses/culinary-creativity-exploring-global-flavors/culinary_creativity.jpg',
            'slug' => 'culinary-creativity-exploring-global-flavors',
            'price' => '129.99',
            'level' => 'Advanced',
            'status' => 'enabled',
            'audio' => 'English',
            'subtitles' => 'Spanish, French, Mandarin',
            'access' => '6 months',
        ]);


        $this->call([
            LessonSeeder::class,
        ]);

        // Update course duration after all the lessons have been created
        foreach (Course::all() as $course) {
            $totalTime = 0;
            foreach ($course->lessons()->get() as $lesson) {
                $totalTime += $lesson->duration;
            }

            $course->duration = $totalTime;
            $course->save();
        }
    }
}
