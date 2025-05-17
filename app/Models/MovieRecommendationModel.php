<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory,
    Illuminate\Database\Eloquent\Model,
    Illuminate\Support\Facades\DB;

class MovieRecommendationModel extends Model
{
    use HasFactory;

    protected $table = 'movie_recommendations';

    public function upsertMovieRecommendations(int $movieId, array $movieIds): bool
    {
        return DB::insert(
            'INSERT INTO movie_recommendations (movie_id, recommendation_ids) values (?, ?) ON CONFLICT (movie_id) DO NOTHING',
            [
                $movieId,
                json_encode($movieIds),
            ]
        );
    }
}
