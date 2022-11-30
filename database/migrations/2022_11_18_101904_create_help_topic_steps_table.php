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
        Schema::create('help_topic_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('help_topic_id');
            $table->json('title');
            $table->json('content');
            $table->integer('step_number');
            $table->timestamps();

            $table->foreign('help_topic_id')->references('id')->on('help_topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('help_topic_steps');
    }
};
