<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Escort;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Escort::factory(33)->create()->each(function ($escort) {
            $numReviews = random_int(5, 30);
            
            Review::factory()->count($numReviews)
                ->good()
                ->for($escort)
                ->create();

        });

        Escort::factory(34)->create()->each(function ($escort) {
            $numReviews = random_int(5, 30);
            
            Review::factory()->count($numReviews)
                ->average()
                ->for($escort)
                ->create();

        });

        Escort::factory(33)->create()->each(function ($escort) {
            $numReviews = random_int(5, 30);
            
            Review::factory()->count($numReviews)
                ->bad()
                ->for($escort)
                ->create();

        });
    }
}
