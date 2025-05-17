<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movie_recommendations', function (Blueprint $table) {
            $table->id();
            $table->integer('movie_id')->unique('movie_recommendations_movie_id');
            $table->jsonb('recommendation_ids')->default('[]');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_recommendations');
    }
};
