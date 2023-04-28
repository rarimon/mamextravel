<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitalFecilitisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digital_fecilitis', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id');
            $table->integer('room_id');
            $table->integer('added_by');
            $table->string('faciliti_name');
            $table->string('icon_name');
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
        Schema::dropIfExists('digital_fecilitis');
    }
}
