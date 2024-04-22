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
        Course::factory(2)->create();

        \App\Models\Course::factory()->create([
            'title' => 'Adventure Photography: Capturing Wonders Of Nature',
            'description' => '<div class="p-6 bg-white shadow-md rounded-lg">
            <h2 class="text-2xl font-bold mb-4">Adventure Photography: Capturing Wonders Of Nature</h2>
            <p class="text-gray-700 mb-4">Immerse yourself in the captivating world of Adventure Photography, where every click of the shutter brings you closer to the heart of nature\'s majesty. In this exhilarating course, you will learn the art and science of capturing breathtaking landscapes, wildlife, and outdoor adventures through the lens of your camera.</p>
            <p class="text-gray-700 mb-4">From serene sunsets to rugged mountain peaks, you will discover the secrets to composing compelling shots that tell stories and evoke emotions. Led by seasoned wilderness photographers, you will venture into the great outdoors, honing your skills amidst stunning vistas and diverse ecosystems.</p>
            <p class="text-gray-700 mb-4">Through a combination of interactive lessons and field expeditions, you will master essential techniques such as composition, lighting, and exposure. Whether you are a beginner looking to take your first steps in photography or an experienced shutterbug seeking to refine your craft, this course offers something for every level of enthusiast.</p>
            <p class="text-gray-700 mb-4">By the end of the journey, you will not only have a portfolio brimming with stunning images but also a newfound appreciation for the beauty and diversity of the natural world. Embark on your photographic adventure today and let your creativity soar to new heights!</p>
        </div>
        ',
            'image_path' => '/images/adventure_photography.jpg',
            'slug' => 'adventure-photography-capturing-natures-wonders',
            'price' => '99.99',
            'level' => 'Intermediate',
            'status' => 'enabled',
            'audio' => 'English',
            'subtitles' => 'Italian, English, Spanish',
            'access' => '3 months',
        ]);
    }
}
