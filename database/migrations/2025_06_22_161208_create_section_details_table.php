<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained()->onDelete('cascade');

            $table->text('title')->nullable(); // مقال أو عنوان
            $table->text('content')->nullable(); // محتوى متعدد اللغات (JSON)
            $table->text('image')->nullable(); // صورة واحدة
            $table->text('images')->nullable(); // صور متعددة بصيغة JSON

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
        Schema::dropIfExists('section_details');
    }
}
