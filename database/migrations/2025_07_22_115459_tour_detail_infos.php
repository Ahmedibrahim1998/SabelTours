<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TourDetailInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_detail_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_detail_id')->constrained()->onDelete('cascade');
            $table->json('agenda')->nullable(); // يحتوي على morning, noon, evening
            $table->string('from_month'); // مثلاً June
            $table->string('to_month'); // مثلاً August
            $table->decimal('price', 10, 2); // السعر
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_detail_infos');
    }
}
