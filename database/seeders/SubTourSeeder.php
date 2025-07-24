<?php

namespace Database\Seeders;

use App\Models\SubTour;
use App\Models\Tour;
use App\Models\TourDetail;
use Illuminate\Database\Seeder;

class SubTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // حذف مرتب
        TourDetail::query()->delete();
        SubTour::query()->delete();

        $tours = Tour::all();

        foreach ($tours as $tour) {
            for ($i = 1; $i <= 3; $i++) {
                $sub = SubTour::create([
                    'tour_id' => $tour->id,
                    'name' => [
                        'en' => "Trip {$i} for " . ucfirst($tour->type),
                        'fr' => "Voyage {$i} pour " . ucfirst($tour->type),
                        'it' => "Viaggio {$i} per " . ucfirst($tour->type),
                        'de' => "Reise {$i} für " . ucfirst($tour->type),
                        'es' => "Viaje {$i} para " . ucfirst($tour->type),
                    ],
                    'image' => 'https://source.unsplash.com/400x300/?trip,' . rand(100, 999),
                ]);

                TourDetail::create([
                    'sub_tour_id' => $sub->id,
                    'tour_id'     => $tour->id,
                    'image'       => 'https://source.unsplash.com/800x600/?egypt,tour,' . rand(1, 100),
                    'title'  => [
                        'en' => 'Enjoy a full cultural experience in the heart of Egypt.',
                        'fr' => 'Profitez d\'une expérience culturelle complète au cœur de l\'Égypte.',
                        'it' => 'Goditi un\'esperienza culturale completa nel cuore dell\'Egitto.',
                        'de' => 'Genießen Sie ein vollständiges kulturelles Erlebnis im Herzen Ägyptens.',
                        'es' => 'Disfruta de una experiencia cultural completa en el corazón de Egipto.',
                    ],
                    'description' => [
                        'en' => 'Full details for this trip.',
                        'fr' => 'Détails complets pour ce voyage.',
                        'it' => 'Dettagli completi per questo viaggio.',
                        'de' => 'Vollständige Details zu dieser Reise.',
                        'es' => 'Detalles completos de este viaje.',
                    ],
                    'location'    => 'Cairo, Egypt',
                ]);
            }
        }

        echo "✅ SubTours and TourDetails seeded successfully.\n";
    }
}
