<?php

namespace Database\Seeders;

use App\Models\TourDetail;
use App\Models\TourDetailInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourDetailInfoSeeder extends Seeder
{
    public function run(): void
    {
        // تعطيل القيود مؤقتاً
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        TourDetailInfo::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // جلب بيانات tour_details
        $tourDetails = TourDetail::all();

        if ($tourDetails->isEmpty()) {
            return;
        }

        $id = 1;
        foreach ($tourDetails as $detail) {
            TourDetailInfo::create([
                'id' => $id,
                'tour_detail_id' => $detail->id,
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
            ]);
            $id++;
        }

        // إعادة ضبط auto-increment للجدول الصحيح
        $maxId = TourDetailInfo::max('id') + 1;
        DB::statement("ALTER TABLE tour_detail_infos AUTO_INCREMENT = $maxId;");
    }
}
