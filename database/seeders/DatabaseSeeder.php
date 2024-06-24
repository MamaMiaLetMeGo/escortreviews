<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\form;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        form::factory(33)->create()->each(function ($form) {
            $numReviews = random_int(5, 30);
            
            Review::factory()->count($numReviews)
                ->good()
                ->for($form)
                ->create();

        });

        form::factory(34)->create()->each(function ($form) {
            $numReviews = random_int(5, 30);
            
            Review::factory()->count($numReviews)
                ->average()
                ->for($form)
                ->create();

        });

        form::factory(33)->create()->each(function ($form) {
            $numReviews = random_int(5, 30);
            
            Review::factory()->count($numReviews)
                ->bad()
                ->for($form)
                ->create();

        });
    }
}
