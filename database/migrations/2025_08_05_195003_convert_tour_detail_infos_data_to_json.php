<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ConvertTourDetailInfosDataToJson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // تحويل البيانات الموجودة إلى JSON
        $tourDetailInfos = DB::table('tour_detail_infos')->get();
        
        foreach ($tourDetailInfos as $info) {
            // تحويل from_month إلى JSON
            $fromMonthJson = json_encode([
                'ar' => $info->from_month,
                'en' => $info->from_month,
                'fr' => $info->from_month,
                'es' => $info->from_month,
                'it' => $info->from_month,
                'de' => $info->from_month,
            ], JSON_UNESCAPED_UNICODE);
            
            // تحويل to_month إلى JSON
            $toMonthJson = json_encode([
                'ar' => $info->to_month,
                'en' => $info->to_month,
                'fr' => $info->to_month,
                'es' => $info->to_month,
                'it' => $info->to_month,
                'de' => $info->to_month,
            ], JSON_UNESCAPED_UNICODE);
            
            // تحديث البيانات
            DB::table('tour_detail_infos')
                ->where('id', $info->id)
                ->update([
                    'from_month' => $fromMonthJson,
                    'to_month' => $toMonthJson,
                ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // إرجاع البيانات إلى النص العادي
        $tourDetailInfos = DB::table('tour_detail_infos')->get();
        
        foreach ($tourDetailInfos as $info) {
            $fromMonthArray = json_decode($info->from_month, true);
            $toMonthArray = json_decode($info->to_month, true);
            
            DB::table('tour_detail_infos')
                ->where('id', $info->id)
                ->update([
                    'from_month' => $fromMonthArray['ar'] ?? $info->from_month,
                    'to_month' => $toMonthArray['ar'] ?? $info->to_month,
                ]);
        }
    }
}
