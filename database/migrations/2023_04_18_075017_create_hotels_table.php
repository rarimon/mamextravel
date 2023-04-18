<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('added_by');
            $table->string('hotel_name');
            $table->string('hotel_location');
            $table->string('owner_name');
            $table->longText('description');
            $table->integer('price');
            $table->integer('discount');
            $table->string('description_title');
            $table->string('map_link');
            $table->string('hotel_image');
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
        Schema::dropIfExists('hotels');
    }
}
