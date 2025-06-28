<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // الاسم متعدد اللغات
            $table->json('description')->nullable(); // وصف تفصيلي متعدد اللغات
            $table->enum('type', ['nile', 'city', 'natural','desert']); // نوع الرحلة
            $table->string('image'); // صورة رئيسية
            $table->json('gallery')->nullable(); // صور إضافية
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
        Schema::dropIfExists('tours');
    }
}
