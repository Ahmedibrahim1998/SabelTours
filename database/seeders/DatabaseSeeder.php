<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GovernorateSeeder::class);
         $this->call(PlaceSeeder::class);
         $this->call(PlaceDetailSeeder::class);
         $this->call([SectionSeeder::class,]);
         $this->call([SectionDetailSeeder::class,]);
        $this->call([ClientSeeder::class,]);
        $this->call([ContactSeeder::class,]);
        $this->call([AboutUsSeeder::class,]);
        $this->call([TourSeeder::class,]);
        $this->call([SubTourSeeder::class,]);
        $this->call([TourDetailSeeder::class,]);
        $this->call([CommentSeeder::class,]);
    }
}
