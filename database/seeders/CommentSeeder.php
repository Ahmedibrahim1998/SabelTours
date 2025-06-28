<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Comment;
use App\Models\TourDetail;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Comment::truncate();

        $clients = Client::all();
        $tourDetails = TourDetail::all();

        if ($clients->isEmpty() || $tourDetails->isEmpty()) {
            return; // لو مفيش بيانات في clients أو tour_details، يوقف الـ seeder
        }

        $sampleData = [
            [
                'name' => 'Ahmed Ali',
                'email' => 'ahmed@example.com',
                'comment' => 'رحلة رائعة جدًا، استمتعت بكل لحظة.',
                'rating' => 5,
                'image' => 'https://randomuser.me/api/portraits/men/10.jpg',
            ],
            [
                'name' => 'Sara Youssef',
                'email' => 'sara@example.com',
                'comment' => 'تنظيم ممتاز والطبيعة كانت خلابة.',
                'rating' => 4,
                'image' => 'https://randomuser.me/api/portraits/women/11.jpg',
            ],
            [
                'name' => 'Omar Said',
                'email' => 'omar@example.com',
                'comment' => 'خدمة ممتازة جدًا وأنصح الجميع بها.',
                'rating' => 5,
                'image' => 'https://randomuser.me/api/portraits/men/12.jpg',
            ],
        ];

        foreach ($tourDetails as $index => $detail) {
            $commentData = $sampleData[$index % count($sampleData)];
            $client = $clients->random();

            Comment::create(array_merge($commentData, [
                'tour_detail_id' => $detail->id,
                'client_id' => $client->id,
            ]));
        }
    }
}
