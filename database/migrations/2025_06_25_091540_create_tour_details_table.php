<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->string('image');
            $table->json('description'); // وصف كبير متعدد اللغات
            $table->tinyInteger('rate'); // من 1 إلى 5
            $table->json('agenda')->nullable(); // يحتوي على morning, noon, evening
            $table->string('from_month'); // مثلاً June
            $table->string('to_month'); // مثلاً August
            $table->decimal('price', 10, 2); // السعر
            $table->string('location')->nullable();
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
        Schema::dropIfExists('tour_details');
    }
}
