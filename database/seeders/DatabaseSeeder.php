<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Core site seeders
        $this->call([
            PagesSeeder::class,
            CourseStagesSeeder::class,
            TeachersSeeder::class,
            NewsSeeder::class,
            EventsSeeder::class,
            FacilitiesSeeder::class,
            FaqSeeder::class,
        ]);

        // Example user
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
