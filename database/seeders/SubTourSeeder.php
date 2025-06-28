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
                    'description' => [
                        'en' => 'Full details for this trip.',
                        'fr' => 'Détails complets pour ce voyage.',
                        'it' => 'Dettagli completi per questo viaggio.',
                        'de' => 'Vollständige Details zu dieser Reise.',
                        'es' => 'Detalles completos de este viaje.',
                    ],
                    'rate'        => rand(3, 5),
                    'agenda'      => [
                        'morning' => ['text' => 'زيارة صباحية', 'image' => null],
                        'noon'    => ['text' => 'غداء لذيذ', 'image' => null],
                        'evening' => ['text' => 'نشاط مسائي', 'image' => null],
                    ],
                    'from_month'  => 'June',
                    'to_month'    => 'August',
                    'price'       => rand(500, 1500),
                    'location'    => 'Cairo, Egypt',
                ]);
            }
        }

        echo "✅ SubTours and TourDetails seeded successfully.\n";
    }
}
