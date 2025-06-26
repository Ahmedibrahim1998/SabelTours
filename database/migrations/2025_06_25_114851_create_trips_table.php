<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->enum('gender', ['male', 'female']); // نوع الشخص
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->integer('adults_count')->default(1); // عدد الأشخاص البالغين
            $table->integer('children_count')->default(0); // عدد الأطفال
            $table->date('travel_date'); // تاريخ السفر
            $table->text('message')->nullable(); // رسالة إضافية
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
        Schema::dropIfExists('trips');
    }
}
