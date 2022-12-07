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
        Schema::create('help_courses', function (Blueprint $table) {
            $table->id();
            $table->json('title');

            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('county_id')->constrained('counties');

            $table->date('date');
            $table->json('info');
            $table->string('link');
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
        Schema::dropIfExists('help_courses');
    }
};
