<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // الطريقة الآمنة بدون مشاكل foreign key:
        DB::table('tour_details')->delete();

        $tours = Tour::all();

        foreach ($tours as $tour) {
            TourDetail::create([
                'tour_id'    => $tour->id,
                'image'      => 'https://source.unsplash.com/800x600/?egypt,tour,' . rand(1, 100),

                'description' => [
                    'en' => 'Enjoy a full cultural experience in the heart of Egypt.',
                    'fr' => 'Profitez d\'une expérience culturelle complète au cœur de l\'Égypte.',
                    'it' => 'Goditi un\'esperienza culturale completa nel cuore dell\'Egitto.',
                    'de' => 'Genießen Sie ein vollständiges kulturelles Erlebnis im Herzen Ägyptens.',
                    'es' => 'Disfruta de una experiencia cultural completa en el corazón de Egipto.',
                ],

                'rate'       => rand(3, 5),

                'agenda' => [
                    'morning' => [
                        'text' => 'زيارة المتحف الوطني وتجول في السوق.',
                    ],
                    'noon' => [
                        'text' => 'تناول الغداء في مطعم مطل على النيل.',
                    ],
                    'evening' => [
                        'text' => 'رحلة بحرية وحفل موسيقي تقليدي.',
                    ],
                ],

                'from_month' => 'June',
                'to_month'   => 'August',
                'price'      => rand(500, 1000),
                'location'   => 'Cairo, Egypt',
            ]);
        }
    }
}
