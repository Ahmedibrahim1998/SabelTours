<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Place;

class PlaceSeeder extends Seeder
{
    public function run()
    {
        // حذف البيانات القديمة
        DB::table('places')->delete();

        // بيانات 10 أماكن سياحية
        $places = [
            [
                'governorate_id' => 1,
                'name' => [
                    'en' => 'The Egyptian Museum',
                    'fr' => 'Le musée égyptien',
                    'it' => 'Il Museo Egizio',
                    'de' => 'Ägyptisches Museum',
                    'es' => 'El Museo Egipcio',
                ],
                'short_description' => [
                    'en' => 'A large collection of ancient Egyptian antiquities.',
                    'fr' => 'Une grande collection d\'antiquités égyptiennes.',
                    'it' => 'Una vasta collezione di antichità egizie.',
                    'de' => 'Eine große Sammlung altägyptischer Antiquitäten.',
                    'es' => 'Una gran colección de antigüedades egipcias.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/e/e3/Egyptian_Museum_Cairo.jpg',
                'location' => 'Tahrir Square, Cairo',
            ],
            [
                'governorate_id' => 1,
                'name' => [
                    'en' => 'Khan El Khalili',
                    'fr' => 'Khan el-Khalili',
                    'it' => 'Khan el-Khalili',
                    'de' => 'Khan el-Khalili',
                    'es' => 'Khan el-Khalili',
                ],
                'short_description' => [
                    'en' => 'Famous bazaar with traditional crafts and spices.',
                    'fr' => 'Souk célèbre avec artisanat et épices traditionnels.',
                    'it' => 'Bazar famoso con artigianato e spezie.',
                    'de' => 'Berühmter Basar mit traditionellen Handwerken.',
                    'es' => 'Bazar famoso con artesanía y especias.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/f/f8/Khan_El-Khalili.jpg',
                'location' => 'Islamic Cairo',
            ],
            [
                'governorate_id' => 2,
                'name' => [
                    'en' => 'Qaitbay Citadel',
                    'fr' => 'Citadelle de Qaitbay',
                    'it' => 'Cittadella di Qaitbay',
                    'de' => 'Zitadelle von Qaitbay',
                    'es' => 'Ciudadela de Qaitbay',
                ],
                'short_description' => [
                    'en' => 'Historic fortress by the sea.',
                    'fr' => 'Forteresse historique en bord de mer.',
                    'it' => 'Fortezza storica sul mare.',
                    'de' => 'Historische Festung am Meer.',
                    'es' => 'Fortaleza histórica junto al mar.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/8/83/Citadel_of_Qaitbay_Alexandria.jpg',
                'location' => 'Alexandria coast',
            ],
            [
                'governorate_id' => 2,
                'name' => [
                    'en' => 'Library of Alexandria',
                    'fr' => 'Bibliothèque d\'Alexandrie',
                    'it' => 'Biblioteca di Alessandria',
                    'de' => 'Bibliothek von Alexandria',
                    'es' => 'Biblioteca de Alejandría',
                ],
                'short_description' => [
                    'en' => 'Modern library inspired by the ancient one.',
                    'fr' => 'Bibliothèque moderne inspirée de l\'ancienne.',
                    'it' => 'Biblioteca moderna ispirata all\'antica.',
                    'de' => 'Moderne Bibliothek inspiriert von der antiken.',
                    'es' => 'Biblioteca moderna inspirada en la antigua.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/9/97/Bibliotheca_Alexandrina.jpg',
                'location' => 'Alexandria city center',
            ],
            [
                'governorate_id' => 3,
                'name' => [
                    'en' => 'Great Sphinx of Giza',
                    'fr' => 'Grand Sphinx de Gizeh',
                    'it' => 'Grande Sfinge di Giza',
                    'de' => 'Große Sphinx von Gizeh',
                    'es' => 'Gran Esfinge de Guiza',
                ],
                'short_description' => [
                    'en' => 'Ancient limestone statue with a lion\'s body.',
                    'fr' => 'Statue ancienne en calcaire avec un corps de lion.',
                    'it' => 'Statua antica in calcare con corpo di leone.',
                    'de' => 'Alte Kalksteinstatue mit Löwenkörper.',
                    'es' => 'Antigua estatua de piedra caliza con cuerpo de león.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/c/c4/Great_Sphinx_of_Giza_-_20080716a.jpg',
                'location' => 'Giza Plateau',
            ],
            [
                'governorate_id' => 3,
                'name' => [
                    'en' => 'Pyramids of Giza',
                    'fr' => 'Pyramides de Gizeh',
                    'it' => 'Piramidi di Giza',
                    'de' => 'Pyramiden von Gizeh',
                    'es' => 'Pirámides de Guiza',
                ],
                'short_description' => [
                    'en' => 'Ancient wonders of the world.',
                    'fr' => 'Merveilles antiques du monde.',
                    'it' => 'Antiche meraviglie del mondo.',
                    'de' => 'Antike Weltwunder.',
                    'es' => 'Antiguas maravillas del mundo.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/e/e3/Kheops-Pyramid.jpg',
                'location' => 'Giza Plateau',
            ],
            [
                'governorate_id' => 4,
                'name' => [
                    'en' => 'Karnak Temple',
                    'fr' => 'Temple de Karnak',
                    'it' => 'Tempio di Karnak',
                    'de' => 'Tempel von Karnak',
                    'es' => 'Templo de Karnak',
                ],
                'short_description' => [
                    'en' => 'One of the largest religious buildings ever built.',
                    'fr' => 'L\'un des plus grands bâtiments religieux jamais construits.',
                    'it' => 'Uno dei più grandi edifici religiosi mai costruiti.',
                    'de' => 'Eines der größten religiösen Bauwerke.',
                    'es' => 'Uno de los edificios religiosos más grandes.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/6c/Karnak_Entrance_Luxor_Egypt_2007.JPG',
                'location' => 'Luxor',
            ],
            [
                'governorate_id' => 4,
                'name' => [
                    'en' => 'Valley of the Kings',
                    'fr' => 'Vallée des Rois',
                    'it' => 'Valle dei Re',
                    'de' => 'Tal der Könige',
                    'es' => 'Valle de los Reyes',
                ],
                'short_description' => [
                    'en' => 'Tombs of the ancient Egyptian pharaohs.',
                    'fr' => 'Tombes des anciens pharaons égyptiens.',
                    'it' => 'Tombe dei faraoni dell\'antico Egitto.',
                    'de' => 'Gräber der altägyptischen Pharaonen.',
                    'es' => 'Tumbas de los antiguos faraones egipcios.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/7e/Valley_of_the_Kings.jpg',
                'location' => 'Luxor',
            ],
            [
                'governorate_id' => 5,
                'name' => [
                    'en' => 'Philae Temple',
                    'fr' => 'Temple de Philae',
                    'it' => 'Tempio di Philae',
                    'de' => 'Tempel von Philae',
                    'es' => 'Templo de File',
                ],
                'short_description' => [
                    'en' => 'Temple dedicated to the goddess Isis.',
                    'fr' => 'Temple dédié à la déesse Isis.',
                    'it' => 'Tempio dedicato alla dea Iside.',
                    'de' => 'Tempel der Göttin Isis.',
                    'es' => 'Templo dedicado a la diosa Isis.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/5/5f/Philae_2008.JPG',
                'location' => 'Aswan Island',
            ],
            [
                'governorate_id' => 5,
                'name' => [
                    'en' => 'Aswan High Dam',
                    'fr' => 'Haute barrage d\'Assouan',
                    'it' => 'Grande diga di Assuan',
                    'de' => 'Assuan-Staudamm',
                    'es' => 'Gran presa de Asuán',
                ],
                'short_description' => [
                    'en' => 'Major engineering achievement on the Nile.',
                    'fr' => 'Grande réalisation d\'ingénierie sur le Nil.',
                    'it' => 'Grande opera di ingegneria sul Nilo.',
                    'de' => 'Großes Bauwerk am Nil.',
                    'es' => 'Gran obra de ingeniería en el Nilo.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/2/2e/Aswan_Dam_from_air_2011.jpg',
                'location' => 'Aswan',
            ],
        ];

        foreach ($places as $place) {
            Place::create([
                'governorate_id' => $place['governorate_id'],
                'name' => json_encode($place['name']),
                'short_description' => json_encode($place['short_description']),
                'image' => $place['image'],
                'location' => $place['location'],
            ]);
        }
    }
}
