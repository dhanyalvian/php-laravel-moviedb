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
        Schema::table('movies', function (Blueprint $table) {
            $table->double('budget')->default(0);
            $table->string('homepage')->nullable()->default('');
            $table->string('tagline')->nullable()->default('');
            $table->decimal('popularity', 8, 4)->default(0);
            $table->jsonb('origin_country')->nullable()->default('[]');
            $table->jsonb('production_countries')->nullable()->default('[]');
            $table->jsonb('spoken_languages')->nullable()->default('[]');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('budget');
            $table->dropColumn('homepage');
            $table->dropColumn('tagline');
            $table->dropColumn('popularity');
            $table->dropColumn('origin_country');
            $table->dropColumn('production_countries');
            $table->dropColumn('spoken_languages');
        });
    }
};
