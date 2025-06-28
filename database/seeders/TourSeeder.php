<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['nile', 'city', 'natural','desert'];

        for ($i = 1; $i <= 10; $i++) {
            Tour::create([
                'name' => [
                    'en' => "Tour $i",
                    'fr' => "Excursion $i",
                    'it' => "Giro $i",
                    'de' => "Tour $i",
                    'es' => "Tour $i",
                ],
                'description' => [
                    'en' => "This is the description of tour $i in English.",
                    'fr' => "Ceci est la description de l'excursion $i en français.",
                    'it' => "Questa è la descrizione del tour $i in italiano.",
                    'de' => "Dies ist die Beschreibung der Tour $i auf Deutsch.",
                    'es' => "Esta es la descripción del tour $i en español.",
                ],
                'type' => $types[array_rand($types)],
                'image' => "https://via.placeholder.com/600x300?text=Tour+$i",
                'gallery' => [
                    "https://via.placeholder.com/300x200?text=Gallery+$i-1",
                    "https://via.placeholder.com/300x200?text=Gallery+$i-2",
                ],
            ]);
        }
    }
}
