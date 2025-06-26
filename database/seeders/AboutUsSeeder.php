<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUs;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    public function run()
    {
        DB::table('about_us')->delete();

        AboutUs::create([
            'team_name' => 'Sable d\'Egypte',
            'about_text' => json_encode([
                'en' => 'We are a passionate team providing authentic Egyptian experiences.',
                'fr' => 'Nous sommes une équipe passionnée offrant des expériences authentiques en Égypte.',
                'it' => 'Siamo un team appassionato che offre esperienze autentiche in Egitto.',
                'de' => 'Wir sind ein leidenschaftliches Team, das authentische Erlebnisse in Ägypten bietet.',
                'es' => 'Somos un equipo apasionado que ofrece experiencias auténticas en Egipto.'
            ]),
            'goals' => json_encode([
                'en' => 'To promote cultural tourism and highlight Egypt\'s rich heritage.',
                'fr' => 'Promouvoir le tourisme culturel et mettre en valeur le riche patrimoine de l\'Égypte.',
                'it' => 'Promuovere il turismo culturale e valorizzare il ricco patrimonio dell\'Egitto.',
                'de' => 'Förderung des Kulturtourismus und Hervorhebung des reichen Erbes Ägyptens.',
                'es' => 'Promover el turismo cultural y destacar el rico patrimonio de Egipto.'
            ]),
            'images' => json_encode([
                'https://upload.wikimedia.org/wikipedia/commons/e/e3/Kheops-Pyramid.jpg',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Cairo_by_Night.jpg/1200px-Cairo_by_Night.jpg'
            ])
        ]);
    }
}
