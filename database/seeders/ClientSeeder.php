<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->delete();

        $clients = [
            [
                'name' => [
                    'en' => 'John Doe', 'fr' => 'Jean Dupont', 'it' => 'Giovanni Rossi',
                    'de' => 'Johann Schmidt', 'es' => 'Juan Pérez'
                ],
                'date' => '2024-11-10',
                'description' => [
                    'en' => 'Amazing experience, totally recommend!',
                    'fr' => 'Expérience incroyable, je recommande vivement !',
                    'it' => 'Esperienza fantastica, lo consiglio vivamente!',
                    'de' => 'Erstaunliche Erfahrung, sehr zu empfehlen!',
                    'es' => 'Experiencia increíble, ¡lo recomiendo totalmente!'
                ],
                'image' => 'https://randomuser.me/api/portraits/men/1.jpg',
            ],
            [
                'name' => [
                    'en' => 'Emily Clark', 'fr' => 'Émilie Dubois', 'it' => 'Emilia Bianchi',
                    'de' => 'Emilie Müller', 'es' => 'Emilia García'
                ],
                'date' => '2024-10-25',
                'description' => [
                    'en' => 'The tour was well-organized and fun.',
                    'fr' => 'La visite était bien organisée et amusante.',
                    'it' => 'Il tour era ben organizzato e divertente.',
                    'de' => 'Die Tour war gut organisiert und unterhaltsam.',
                    'es' => 'El tour estuvo bien organizado y divertido.'
                ],
                'image' => 'https://randomuser.me/api/portraits/women/2.jpg',
            ],
            [
                'name' => [
                    'en' => 'Michael Lee', 'fr' => 'Michel Lefevre', 'it' => 'Michele De Luca',
                    'de' => 'Michael König', 'es' => 'Miguel Torres'
                ],
                'date' => '2025-01-15',
                'description' => [
                    'en' => 'Unforgettable memories, thank you!',
                    'fr' => 'Des souvenirs inoubliables, merci !',
                    'it' => 'Ricordi indimenticabili, grazie!',
                    'de' => 'Unvergessliche Erinnerungen, danke!',
                    'es' => 'Recuerdos inolvidables, ¡gracias!'
                ],
                'image' => 'https://randomuser.me/api/portraits/men/3.jpg',
            ],
            [
                'name' => [
                    'en' => 'Sophia Brown', 'fr' => 'Sophie Moreau', 'it' => 'Sofia Neri',
                    'de' => 'Sophie Braun', 'es' => 'Sofía Moreno'
                ],
                'date' => '2024-11-10',
                'description' => [
                    'en' => 'Loved every moment of the trip!',
                    'fr' => 'J\'ai adoré chaque instant du voyage !',
                    'it' => 'Ho amato ogni momento del viaggio!',
                    'de' => 'Ich habe jeden Moment der Reise geliebt!',
                    'es' => '¡Me encantó cada momento del viaje!'
                ],
                'image' => 'https://randomuser.me/api/portraits/women/4.jpg',
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}