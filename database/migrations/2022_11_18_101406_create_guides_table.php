<?php

declare(strict_types=1);

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
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->json('title');
            $table->string('slug');
        });

        Schema::create('guide_steps', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('guide_id')->constrained('guides')->cascadeOnDelete();
            $table->integer('position')->index();
            $table->json('title');
            $table->json('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guide_steps');
        Schema::dropIfExists('guides');
    }
};
