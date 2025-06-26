<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        DB::table('sections')->delete();

        $sections = [
            [
                'name' => [
                    'en' => 'Historical Sites',
                    'fr' => 'Sites historiques',
                    'it' => 'Siti storici',
                    'de' => 'Historische Stätten',
                    'es' => 'Sitios históricos',
                ],
                'short_description' => [
                    'en' => 'Explore ancient landmarks.',
                    'fr' => 'Découvrez des monuments anciens.',
                    'it' => 'Esplora monumenti antichi.',
                    'de' => 'Entdecken Sie antike Wahrzeichen.',
                    'es' => 'Explora monumentos antiguos.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/e/e3/Kheops-Pyramid.jpg',
                'type' => 'Essential',
            ],
            [
                'name' => [
                    'en' => 'Cultural Events',
                    'fr' => 'Événements culturels',
                    'it' => 'Eventi culturali',
                    'de' => 'Kulturelle Veranstaltungen',
                    'es' => 'Eventos culturales',
                ],
                'short_description' => [
                    'en' => 'Join cultural activities.',
                    'fr' => 'Participez à des activités culturelles.',
                    'it' => 'Partecipa ad attività culturali.',
                    'de' => 'Nehmen Sie an kulturellen Aktivitäten teil.',
                    'es' => 'Participa en actividades culturales.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/8/87/Egyptian_festival.jpg',
                'type' => 'Practical_Information',
            ],
            [
                'name' => [
                    'en' => 'Traditional Food',
                    'fr' => 'Nourriture traditionnelle',
                    'it' => 'Cibo tradizionale',
                    'de' => 'Traditionelles Essen',
                    'es' => 'Comida tradicional',
                ],
                'short_description' => [
                    'en' => 'Taste authentic Egyptian food.',
                    'fr' => 'Goûtez à la cuisine égyptienne authentique.',
                    'it' => 'Assaggia il cibo egiziano autentico.',
                    'de' => 'Probieren Sie authentisches ägyptisches Essen.',
                    'es' => 'Prueba la auténtica comida egipcia.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/66/Koshary.jpg',
                'type' => 'Practical_Information',
            ],
            [
                'name' => [
                    'en' => 'Natural Landscapes',
                    'fr' => 'Paysages naturels',
                    'it' => 'Paesaggi naturali',
                    'de' => 'Naturlandschaften',
                    'es' => 'Paisajes naturales',
                ],
                'short_description' => [
                    'en' => 'Enjoy nature and scenery.',
                    'fr' => 'Profitez de la nature et du paysage.',
                    'it' => 'Goditi la natura e il paesaggio.',
                    'de' => 'Genießen Sie Natur und Landschaft.',
                    'es' => 'Disfruta de la naturaleza y el paisaje.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/4a/Siwa_Oasis.jpg',
                'type' => 'Practical_Information',
            ],
            [
                'name' => [
                    'en' => 'Desert Adventures',
                    'fr' => 'Aventures dans le désert',
                    'it' => 'Avventure nel deserto',
                    'de' => 'Wüstenabenteuer',
                    'es' => 'Aventuras en el desierto',
                ],
                'short_description' => [
                    'en' => 'Safari and sandboarding experiences.',
                    'fr' => 'Expériences de safari et de sandboard.',
                    'it' => 'Esperienze di safari e sandboarding.',
                    'de' => 'Safari- und Sandboard-Erlebnisse.',
                    'es' => 'Experiencias de safari y sandboard.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/2/2c/Sahara_Desert.jpg',
                'type' => 'Practical_Information',
            ],
            [
                'name' => [
                    'en' => 'Museums',
                    'fr' => 'Musées',
                    'it' => 'Musei',
                    'de' => 'Museen',
                    'es' => 'Museos',
                ],
                'short_description' => [
                    'en' => 'Visit Egyptian museums.',
                    'fr' => 'Visitez les musées égyptiens.',
                    'it' => 'Visita i musei egiziani.',
                    'de' => 'Besuchen Sie ägyptische Museen.',
                    'es' => 'Visita los museos egipcios.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/3/32/Grand_Egyptian_Museum.jpg',
                'type' => 'Practical_Information',
            ],
            [
                'name' => [
                    'en' => 'Handicrafts',
                    'fr' => 'Artisanat',
                    'it' => 'Artigianato',
                    'de' => 'Handwerk',
                    'es' => 'Artesanía',
                ],
                'short_description' => [
                    'en' => 'Discover handmade crafts.',
                    'fr' => 'Découvrez des objets faits main.',
                    'it' => 'Scopri artigianato fatto a mano.',
                    'de' => 'Entdecken Sie handgefertigte Kunstwerke.',
                    'es' => 'Descubre artesanías hechas a mano.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/5/56/Khan_El_Khalili_handcrafts.jpg',
                'type' => 'Climate',
            ],
            [
                'name' => [
                    'en' => 'Religious Monuments',
                    'fr' => 'Monuments religieux',
                    'it' => 'Monumenti religiosi',
                    'de' => 'Religiöse Monumente',
                    'es' => 'Monumentos religiosos',
                ],
                'short_description' => [
                    'en' => 'Ancient churches and mosques.',
                    'fr' => 'Anciennes églises et mosquées.',
                    'it' => 'Antiche chiese e moschee.',
                    'de' => 'Alte Kirchen und Moscheen.',
                    'es' => 'Antiguas iglesias y mezquitas.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/e/e8/Mosque_of_Muhammad_Ali.jpg',
                'type' => 'Climate',
            ],
            [
                'name' => [
                    'en' => 'Beaches',
                    'fr' => 'Plages',
                    'it' => 'Spiagge',
                    'de' => 'Strände',
                    'es' => 'Playas',
                ],
                'short_description' => [
                    'en' => 'Relax by the sea.',
                    'fr' => 'Détendez-vous au bord de la mer.',
                    'it' => 'Rilassati al mare.',
                    'de' => 'Entspannen Sie sich am Meer.',
                    'es' => 'Relájate junto al mar.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/6d/Red_Sea_beach.jpg',
                'type' => 'Climate',
            ],
            [
                'name' => [
                    'en' => 'Modern Attractions',
                    'fr' => 'Attractions modernes',
                    'it' => 'Attrazioni moderne',
                    'de' => 'Moderne Attraktionen',
                    'es' => 'Atracciones modernas',
                ],
                'short_description' => [
                    'en' => 'Explore modern shopping and parks.',
                    'fr' => 'Découvrez les centres commerciaux modernes.',
                    'it' => 'Esplora i centri commerciali moderni.',
                    'de' => 'Erkunden Sie moderne Einkaufszentren.',
                    'es' => 'Explora centros comerciales modernos.',
                ],
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/a/a5/Cairo_Festival_City.jpg',
                'type' => 'Climate',
            ],
        ];

        foreach ($sections as $section) {
            Section::create([
                'name' => json_encode($section['name']),
                'short_description' => json_encode($section['short_description']),
                'image' => $section['image'],
                'type' => $section['type'],
            ]);
        }
    }
}