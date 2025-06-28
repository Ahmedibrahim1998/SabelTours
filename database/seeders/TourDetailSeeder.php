<?php

namespace Database\Seeders;

use App\Models\TourDetail;
use App\Models\Tour;
use App\Models\SubTour;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourDetailSeeder extends Seeder
{
    public function run(): void
    {
        // تعطيل الـ foreign key constraints مؤقتًا
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        TourDetail::truncate(); // حذف البيانات وإعادة ضبط الـ auto-increment
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // التأكد من وجود بيانات في جدول tours
        $tours = Tour::all();
        if ($tours->isEmpty()) {
            return; // لو مفيش بيانات في tours، يوقف الـ seeder
        }

        // التأكد من وجود بيانات في جدول sub_tours
        $subTours = SubTour::all();
        if ($subTours->isEmpty()) {
            return; // لو مفيش بيانات في sub_tours، يوقف الـ seeder
        }

        // إضافة بيانات جديدة مع التحكم في الـ ID
        $id = 1; // البداية من ID=1
        foreach ($tours as $tour) {
            $subTour = $subTours->random(); // اختيار sub_tour عشوائي

            TourDetail::create([
                'id' => $id, // تحديد الـ ID يدويًا
                'tour_id' => $tour->id,
                'sub_tour_id' => $subTour->id, // إضافة sub_tour_id
                'image' => 'https://source.unsplash.com/800x600/?egypt,tour,' . rand(1, 100),
                'description' => [
                    'en' => 'Enjoy a full cultural experience in the heart of Egypt.',
                    'fr' => 'Profitez d\'une expérience culturelle complète au cœur de l\'Égypte.',
                    'it' => 'Goditi un\'esperienza culturale completa nel cuore dell\'Egitto.',
                    'de' => 'Genießen Sie ein vollständiges kulturelles Erlebnis im Herzen Ägyptens.',
                    'es' => 'Disfruta de una experiencia cultural completa en el corazón de Egipto.',
                ],
                'rate' => rand(3, 5),
                'agenda' => [
                    'morning' => [
                        'text' => 'زيارة المتحف الوطني وتجول في السوق.',
                    ],
                    'noon' => [
                        'text' => 'تناول الغداء في مطعم مطل على النيل.',
                    ],
                    'evening' => [
                        'text' => 'رحلة بحرية وحفل موسيقي تقليدي.',
                    ],
                ],
                'from_month' => 'June',
                'to_month' => 'August',
                'price' => rand(500, 1000),
                'location' => 'Cairo, Egypt',
            ]);
            $id++; // زيادة الـ ID للسجل التالي
        }

        // إعادة ضبط الـ auto-increment للجدول
        $maxId = TourDetail::max('id') + 1;
        DB::statement("ALTER TABLE tour_details AUTO_INCREMENT = $maxId;");
    }
}
