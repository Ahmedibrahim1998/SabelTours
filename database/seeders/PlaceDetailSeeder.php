<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlaceDetail;
use Illuminate\Support\Facades\DB;

class PlaceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('place_details')->delete();

        $details = [
            [
                'place_id' => 1,
                'long_description' => [
                    'en' => 'The Egyptian Museum is home to the world’s largest collection of Pharaonic antiquities.',
                    'fr' => 'Le musée égyptien possède la plus grande collection d\'antiquités pharaoniques.',
                    'it' => 'Il Museo Egizio ospita la più grande collezione di antichità faraoniche.',
                    'de' => 'Das Ägyptische Museum beherbergt die größte Sammlung pharaonischer Altertümer.',
                    'es' => 'El Museo Egipcio alberga la mayor colección de antigüedades faraónicas.',
                ],
                'images' => [
                    'https://upload.wikimedia.org/wikipedia/commons/e/e3/Egyptian_Museum_Cairo.jpg',
                    'https://upload.wikimedia.org/wikipedia/commons/2/2c/Egyptian_Museum_inside.jpg',
                ],
            ],
            [
                'place_id' => 2,
                'long_description' => [
                    'en' => 'Khan El Khalili is a major souk in the Islamic district of Cairo, famous for traditional crafts.',
                    'fr' => 'Khan el-Khalili est un grand souk du quartier islamique du Caire.',
                    'it' => 'Khan el-Khalili è un grande souk del quartiere islamico del Cairo.',
                    'de' => 'Khan el-Khalili ist ein großer Basar im islamischen Viertel von Kairo.',
                    'es' => 'Khan el-Khalili es un gran zoco en el distrito islámico de El Cairo.',
                ],
                'images' => [
                    'https://upload.wikimedia.org/wikipedia/commons/f/f8/Khan_El-Khalili.jpg',
                    'https://upload.wikimedia.org/wikipedia/commons/4/4f/Khan_El-Khalili_market.jpg',
                ],
            ],
            [
                'place_id' => 3,
                'long_description' => [
                    'en' => 'Qaitbay Citadel was built in the 15th century and is one of the most important defensive strongholds.',
                    'fr' => 'La citadelle de Qaitbay a été construite au XVe siècle.',
                    'it' => 'La cittadella di Qaitbay fu costruita nel XV secolo.',
                    'de' => 'Die Zitadelle von Qaitbay wurde im 15. Jahrhundert erbaut.',
                    'es' => 'La ciudadela de Qaitbay fue construida en el siglo XV.',
                ],
                'images' => [
                    'https://upload.wikimedia.org/wikipedia/commons/8/83/Citadel_of_Qaitbay_Alexandria.jpg',
                    'https://upload.wikimedia.org/wikipedia/commons/5/57/Qaitbay_view.jpg',
                ],
            ],
            [
                'place_id' => 4,
                'long_description' => [
                    'en' => 'The Library of Alexandria is a major library and cultural center in Alexandria, Egypt.',
                    'fr' => 'La bibliothèque d\'Alexandrie est un centre culturel important.',
                    'it' => 'La Biblioteca di Alessandria è un importante centro culturale.',
                    'de' => 'Die Bibliothek von Alexandria ist ein bedeutendes Kulturzentrum.',
                    'es' => 'La Biblioteca de Alejandría es un importante centro cultural.',
                ],
                'images' => [
                    'https://upload.wikimedia.org/wikipedia/commons/9/97/Bibliotheca_Alexandrina.jpg',
                    'https://upload.wikimedia.org/wikipedia/commons/4/4d/Alexandria_Library_inside.jpg',
                ],
            ],
            [
                'place_id' => 5,
                'long_description' => [
                    'en' => 'The Great Sphinx of Giza is a limestone statue of a reclining sphinx.',
                    'fr' => 'Le Grand Sphinx de Gizeh est une statue en calcaire d\'un sphinx couché.',
                    'it' => 'La Grande Sfinge di Giza è una statua calcarea di una sfinge sdraiata.',
                    'de' => 'Die Große Sphinx von Gizeh ist eine Kalksteinstatue einer liegenden Sphinx.',
                    'es' => 'La Gran Esfinge de Guiza es una estatua de piedra caliza de una esfinge reclinada.',
                ],
                'images' => [
                    'https://upload.wikimedia.org/wikipedia/commons/c/c4/Great_Sphinx_of_Giza_-_20080716a.jpg',
                ],
            ],
            [
                'place_id' => 6,
                'long_description' => [
                    'en' => 'The Pyramids of Giza are ancient wonders that have stood for over 4,500 years.',
                    'fr' => 'Les pyramides de Gizeh sont des merveilles antiques vieilles de plus de 4500 ans.',
                    'it' => 'Le piramidi di Giza sono meraviglie antiche che esistono da oltre 4500 anni.',
                    'de' => 'Die Pyramiden von Gizeh sind antike Wunder, die über 4500 Jahre alt sind.',
                    'es' => 'Las pirámides de Guiza son maravillas antiguas con más de 4500 años de antigüedad.',
                ],
                'images' => [
                    'https://upload.wikimedia.org/wikipedia/commons/e/e3/Kheops-Pyramid.jpg',
                    'https://upload.wikimedia.org/wikipedia/commons/1/10/Three_Pyramids_of_Giza.jpg',
                ],
            ],
            [
                'place_id' => 7,
                'long_description' => [
                    'en' => 'Karnak Temple is a vast mix of decayed temples, chapels, pylons, and other buildings.',
                    'fr' => 'Le temple de Karnak est un vaste mélange de temples en ruine.',
                    'it' => 'Il Tempio di Karnak è un vasto complesso di templi in rovina.',
                    'de' => 'Der Karnak-Tempel ist ein weitläufiger Komplex aus Ruinen.',
                    'es' => 'El Templo de Karnak es una mezcla de templos en ruinas.',
                ],
                'images' => [
                    'https://upload.wikimedia.org/wikipedia/commons/6/6c/Karnak_Entrance_Luxor_Egypt_2007.JPG',
                ],
            ],
            [
                'place_id' => 8,
                'long_description' => [
                    'en' => 'Valley of the Kings is a burial site for pharaohs and powerful nobles.',
                    'fr' => 'La Vallée des Rois est un site funéraire pour les pharaons.',
                    'it' => 'La Valle dei Re è un sito funerario per i faraoni.',
                    'de' => 'Das Tal der Könige ist eine Begräbnisstätte für Pharaonen.',
                    'es' => 'El Valle de los Reyes es un sitio funerario para faraones.',
                ],
                'images' => [
                    'https://upload.wikimedia.org/wikipedia/commons/7/7e/Valley_of_the_Kings.jpg',
                ],
            ],
            [
                'place_id' => 9,
                'long_description' => [
                    'en' => 'Philae Temple is dedicated to the goddess Isis and features beautiful carvings.',
                    'fr' => 'Le temple de Philae est dédié à la déesse Isis.',
                    'it' => 'Il tempio di Philae è dedicato alla dea Iside.',
                    'de' => 'Der Tempel von Philae ist der Göttin Isis gewidmet.',
                    'es' => 'El templo de File está dedicado a la diosa Isis.',
                ],
                'images' => [
                    'https://upload.wikimedia.org/wikipedia/commons/5/5f/Philae_2008.JPG',
                    'https://upload.wikimedia.org/wikipedia/commons/f/f7/Philae_inner_court.jpg',
                ],
            ],
            [
                'place_id' => 10,
                'long_description' => [
                    'en' => 'The Aswan High Dam controls the Nile and provides electricity and water storage.',
                    'fr' => 'Le haut barrage d\'Assouan contrôle le Nil.',
                    'it' => 'La diga di Assuan controlla il Nilo.',
                    'de' => 'Der Assuan-Staudamm kontrolliert den Nil.',
                    'es' => 'La presa de Asuán controla el Nilo.',
                ],
                'images' => [
                    'https://upload.wikimedia.org/wikipedia/commons/2/2e/Aswan_Dam_from_air_2011.jpg',
                ],
            ],
        ];

        foreach ($details as $detail) {
            PlaceDetail::create([
                'place_id' => $detail['place_id'],
                'long_description' => json_encode($detail['long_description']),
                'images' => json_encode($detail['images']),
            ]);
        }
    }
}
