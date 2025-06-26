<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Governorate;
use Illuminate\Support\Facades\DB;
class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        // حذف البيانات القديمة
        DB::table('governorates')->delete();

        // المحافظات مع الترجمة و البيانات
        $governorates = [
            [
                'name' => json_encode([
                    'en' => 'Cairo', 'fr' => 'Le Caire', 'it' => 'Il Cairo', 'de' => 'Kairo', 'es' => 'El Cairo'
                ]),
                'places_count' => 15,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/e/e3/Kheops-Pyramid.jpg'
            ],
            [
                'name' => json_encode([
                    'en' => 'Alexandria', 'fr' => 'Alexandrie', 'it' => 'Alessandria', 'de' => 'Alexandria', 'es' => 'Alejandría'
                ]),
                'places_count' => 10,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/72/Corniche_alexandria.jpg'
            ],
            [
                'name' => json_encode([
                    'en' => 'Giza', 'fr' => 'Gizeh', 'it' => 'Giza', 'de' => 'Gizeh', 'es' => 'Guiza'
                ]),
                'places_count' => 8,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/c/c4/Great_Sphinx_of_Giza_-_20080716a.jpg'
            ],
            [
                'name' => json_encode([
                    'en' => 'Luxor', 'fr' => 'Louxor', 'it' => 'Luxor', 'de' => 'Luxor', 'es' => 'Lúxor'
                ]),
                'places_count' => 12,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/6c/Karnak_Entrance_Luxor_Egypt_2007.JPG'
            ],
            [
                'name' => json_encode([
                    'en' => 'Aswan', 'fr' => 'Assouan', 'it' => 'Assuan', 'de' => 'Assuan', 'es' => 'Asuán'
                ]),
                'places_count' => 7,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/2/2e/Aswan_Dam_from_air_2011.jpg'
            ],
            [
                'name' => json_encode([
                    'en' => 'Fayoum', 'fr' => 'Fayoum', 'it' => 'Fayyum', 'de' => 'Fayyum', 'es' => 'Fayún'
                ]),
                'places_count' => 6,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/5/54/Fayoum_wadi_el_rayan.jpg'
            ],
            [
                'name' => json_encode([
                    'en' => 'Hurghada', 'fr' => 'Hourghada', 'it' => 'Hurghada', 'de' => 'Hurghada', 'es' => 'Hurgada'
                ]),
                'places_count' => 9,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/f/f9/Hurghada_Marina_2015.jpg'
            ],
            [
                'name' => json_encode([
                    'en' => 'Sharm El-Sheikh', 'fr' => 'Charm el-Cheikh', 'it' => 'Sharm el-Sheikh', 'de' => 'Scharm el-Scheich', 'es' => 'Sharm el-Sheij'
                ]),
                'places_count' => 14,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/2/2b/Sharm_el-Sheikh_resort_2012.jpg'
            ],
            [
                'name' => json_encode([
                    'en' => 'Ismailia', 'fr' => 'Ismaïlia', 'it' => 'Ismailia', 'de' => 'Ismailia', 'es' => 'Ismailía'
                ]),
                'places_count' => 4,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/a/a7/Ismailia_Canal.jpg'
            ],
            [
                'name' => json_encode([
                    'en' => 'Port Said', 'fr' => 'Port-Saïd', 'it' => 'Port Said', 'de' => 'Port Said', 'es' => 'Puerto Saíd'
                ]),
                'places_count' => 5,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/8/87/Port_Said_Entrance.jpg'
            ],
        ];

        // حفظ البيانات
        foreach ($governorates as $gov) {
            Governorate::create([
                'name' => $gov['name'],
                'places_count' => $gov['places_count'],
                'image' => $gov['image'],
            ]);
        }
    }
}
