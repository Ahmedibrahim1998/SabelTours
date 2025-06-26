<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\SectionDetail;

class SectionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section_details')->delete();

        // section_id 1: Practical_Information
        SectionDetail::create([
            'section_id' => 1,
            'content' => json_encode([
                'en' => 'Important practical tips for visiting Egypt.',
                'fr' => 'Conseils pratiques importants pour visiter l\'Égypte.',
                'it' => 'Importanti suggerimenti pratici per visitare l\'Egitto.',
                'de' => 'Wichtige praktische Tipps für den Besuch Ägyptens.',
                'es' => 'Consejos prácticos importantes para visitar Egipto.',
            ]),
        ]);

        // section_id 2: Climate (Summer)
        SectionDetail::create([
            'section_id' => 2,
            'title' => 'Summer in Egypt',
            'content' => json_encode([
                'en' => 'Hot and dry, perfect for beach lovers.',
                'fr' => 'Chaud et sec, idéal pour les amateurs de plage.',
                'it' => 'Caldo e secco, perfetto per gli amanti della spiaggia.',
                'de' => 'Heiß und trocken, ideal für Strandliebhaber.',
                'es' => 'Caluroso y seco, perfecto para los amantes de la playa.',
            ]),
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/6d/Red_Sea_beach.jpg',
        ]);

        // section_id 2: Climate (Winter)
        SectionDetail::create([
            'section_id' => 2,
            'title' => 'Winter in Egypt',
            'content' => json_encode([
                'en' => 'Mild weather, great for sightseeing.',
                'fr' => 'Temps doux, idéal pour les visites touristiques.',
                'it' => 'Clima mite, ottimo per visitare.',
                'de' => 'Mildes Wetter, ideal für Besichtigungen.',
                'es' => 'Clima suave, ideal para hacer turismo.',
            ]),
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/4a/Siwa_Oasis.jpg',
        ]);

        // section_id 3: Essential
        SectionDetail::create([
            'section_id' => 3,
            'content' => json_encode([
                'en' => 'Essential travel advice and tips.',
                'fr' => 'Conseils et astuces de voyage essentiels.',
                'it' => 'Consigli e suggerimenti essenziali per il viaggio.',
                'de' => 'Wesentliche Reisetipps und Ratschläge.',
                'es' => 'Consejos y recomendaciones de viaje esenciales.',
            ]),
            'images' => json_encode([
                'https://upload.wikimedia.org/wikipedia/commons/e/e3/Kheops-Pyramid.jpg',
                'https://upload.wikimedia.org/wikipedia/commons/3/32/Grand_Egyptian_Museum.jpg',
                'https://upload.wikimedia.org/wikipedia/commons/a/a5/Cairo_Festival_City.jpg',
            ]),
        ]);
    }
}
