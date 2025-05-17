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
        Schema::create('peoples', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('original_name');
            $table->integer('gender')->default(0);
            $table->string('profile_path')->nullable()->default('');
            $table->boolean('adult')->default(false);
            $table->decimal('popularity', 8, 4)->default(0);
            $table->string('known_for_department')->default('');
            $table->jsonb('known_for')->nullable()->default('[]');
            $table->jsonb('also_known_as')->nullable()->default('[]');
            $table->string('biography')->nullable()->default('');
            $table->string('place_of_birth')->nullable()->default('');
            $table->date('birthday');
            $table->date('deathday');
            $table->string('slug')->unique('peoples_slug');
            $table->string('homepage')->default('');
            $table->string('imdb_id')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peoples');
    }
};
