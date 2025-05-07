<?php

use Illuminate\Database\Migrations\Migration,
    Illuminate\Database\Schema\Blueprint,
    Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->string('imdb_id')->nullable()->default('');
            $table->string('status')->nullable()->default('');
            $table->integer('runtime')->nullable()->default(0);
            $table->double('revenue')->default(0);
            $table->decimal('vote_average', 8, 3)->default(0);
            $table->integer('vote_count')->default(0);
            $table->jsonb('production_companies')->nullable()->default('[]');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('imdb_id');
            $table->dropColumn('status');
            $table->dropColumn('runtime');
            $table->dropColumn('revenue');
            $table->dropColumn('vote_average');
            $table->dropColumn('vote_count');
            $table->dropColumn('production_companies');
        });
    }
};
