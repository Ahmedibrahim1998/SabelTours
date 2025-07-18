<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_details', function (Blueprint $table) {
            $table->id();
             $table->foreignId('place_id')->constrained()->onDelete('cascade');
            $table->text('long_description'); // JSON string
            $table->text('images'); // JSON array string
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
        Schema::dropIfExists('place_details');
    }
}
