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
            $table->string('title');

            $table->integer('city_id');
            $table->integer('county_id');

            $table->date('date');
            $table->string('info');
            $table->string('link');
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('restrict');
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('restrict');
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
