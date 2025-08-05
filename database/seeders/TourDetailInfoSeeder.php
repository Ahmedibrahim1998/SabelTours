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
                        'ar' => 'زيارة المتحف الوطني وتجول في السوق.',
                        'en' => 'Visit the national museum and stroll in the market.',
                        'fr' => 'Visite du musée national et promenade au marché.',
                        'es' => 'Visita al museo nacional y paseo por el mercado.',
                        'it' => 'Visita al museo nazionale e passeggiata al mercato.',
                        'de' => 'Besuch des Nationalmuseums und Bummel über den Markt.',
                    ],
                    'noon' => [
                        'ar' => 'تناول الغداء في مطعم مطل على النيل.',
                        'en' => 'Lunch at a restaurant overlooking the Nile.',
                        'fr' => 'Déjeuner dans un restaurant surplombant le Nil.',
                        'es' => 'Almuerzo en un restaurante con vistas al Nilo.',
                        'it' => 'Pranzo in un ristorante con vista sul Nilo.',
                        'de' => 'Mittagessen in einem Restaurant mit Blick auf den Nil.',
                    ],
                    'evening' => [
                        'ar' => 'رحلة بحرية وحفل موسيقي تقليدي.',
                        'en' => 'Boat trip and traditional music concert.',
                        'fr' => 'Croisière et concert de musique traditionnelle.',
                        'es' => 'Paseo en barco y concierto de música tradicional.',
                        'it' => 'Giro in barca e concerto di musica tradizionale.',
                        'de' => 'Bootsfahrt und traditionelles Musikkonzert.',
                    ],
                ],
                'from_month' => [
                    'ar' => 'يونيو',
                    'en' => 'June',
                    'fr' => 'Juin',
                    'es' => 'Junio',
                    'it' => 'Giugno',
                    'de' => 'Juni',
                ],
                'to_month' => [
                    'ar' => 'أغسطس',
                    'en' => 'August',
                    'fr' => 'Août',
                    'es' => 'Agosto',
                    'it' => 'Agosto',
                    'de' => 'August',
                ],
                'price' => rand(500, 1000),
            ]);
            $id++;
        }

        // إعادة ضبط auto-increment للجدول الصحيح
        $maxId = TourDetailInfo::max('id') + 1;
        DB::statement("ALTER TABLE tour_detail_infos AUTO_INCREMENT = $maxId;");
    }
}
