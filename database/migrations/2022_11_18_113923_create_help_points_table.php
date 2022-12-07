<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_points', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('type');

            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('county_id')->constrained('counties');
            $table->string('address');

            $table->json('time_schedule');
            $table->string('lat');
            $table->string('lng');
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
        Schema::dropIfExists('help_points');
    }
};
