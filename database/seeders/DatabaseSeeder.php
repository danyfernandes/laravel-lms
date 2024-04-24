<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Daniel Fernandes',
            'email' => 'fernandesda4@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => 1,
        ]);

        $this->call([
            CourseSeeder::class,
        ]);
    }
}
