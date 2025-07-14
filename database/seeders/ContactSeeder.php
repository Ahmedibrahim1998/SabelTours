<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->delete();

        $contacts = [
            [
                'name' => 'Ahmed Ibrahim',
                'email' => 'ahmed@example.com',
                'phone' => '0101000001',
                'message' => 'I would like to know more about your tours to Luxor.'
            ],
            [
                'name' => 'Sarah Ali',
                'email' => 'sarah@example.com',
                'phone' => '0101000002',
                'message' => 'Do you offer student discounts?'
            ],
            [
                'name' => 'Mohamed Adel',
                'email' => 'm.adel@example.com',
                'phone' => '0101000003',
                'message' => 'Can I books a private guide for Aswan?'
            ],
            [
                'name' => 'Lina Hassan',
                'email' => 'lina@example.com',
                'phone' => '0101000004',
                'message' => 'Do you have packages for families with children?'
            ],
            [
                'name' => 'Youssef Khaled',
                'email' => 'y.khaled@example.com',
                'phone' => '0101000005',
                'message' => 'What languages do your tour guides speak?'
            ],
            [
                'name' => 'Fatima Zahra',
                'email' => 'fatima@example.com',
                'phone' => '0101000006',
                'message' => 'I want to cancel a booking. How can I do that?'
            ],
            [
                'name' => 'Karim Nabil',
                'email' => 'karim@example.com',
                'phone' => '0101000007',
                'message' => 'Do you offer hotel pickups in Cairo?'
            ],
            [
                'name' => 'Mona Samir',
                'email' => 'mona@example.com',
                'phone' => '0101000008',
                'message' => 'What’s the best time to visit the pyramids?'
            ],
            [
                'name' => 'Hassan Rami',
                'email' => 'hassan@example.com',
                'phone' => '0101000009',
                'message' => 'Can you customize a tour for 10 people?'
            ],
            [
                'name' => 'Dina Farouk',
                'email' => 'dina@example.com',
                'phone' => '0101000010',
                'message' => 'Is there a guide available for the Alexandria trip?'
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}
