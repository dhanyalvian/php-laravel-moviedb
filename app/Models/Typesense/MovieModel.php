<?php

namespace App\Models\Typesense;

class MovieModel extends BaseModel
{
    protected $tsCollection = 'moviedb_movies';

    public function upsert(array $movie, array $recommendationIds)
    {
        $collection = $this->getTsCollection();
        $posterPath = sprintf(
            "%s%s%s",
            env('TMDB_URL_MEDIA'),
            env('TMDB_URL_IMG_THUMBNAIL'),
            $movie['poster_path']
        );
        
        return $this->ts->collections[$collection]->documents->upsert(
            [
                'id' => (string) $movie['id'],
                'title' => $movie['title'],
                'original_title' => $movie['original_title'],
                'slug' => $movie['slug'],
                'poster_path' => $posterPath,
                'release_date' => strtotime($movie['release_date']),
                'original_language' => $movie['original_language'],
                'genre_ids' => json_decode($movie['genre_ids'], true),
                'status' => $movie['status'],
                'vote_average' => $movie['vote_average'],
                'vote_count' => $movie['vote_count'],
                'popularity' => $movie['popularity'],
                'recommendation_ids' => $recommendationIds,
            ],
            [
                'dirty_values' => 'coerce_or_reject',
            ]
        );
    }
}
