<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->date('travel_date');
            $table->integer('stay_duration'); // بالأيام
            $table->integer('children_count')->default(0);
	    $table->integer('number_person')->default(0);
            $table->enum('accommodation_type', ['family', 'single', 'shared']);
            $table->text('accommodation_message')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->text('message')->nullable();
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
        Schema::dropIfExists('books');
    }
}
