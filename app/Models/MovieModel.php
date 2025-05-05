<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory,
    Illuminate\Database\Eloquent\Model,
    Illuminate\Support\Facades\DB,
    Illuminate\Support\Str;

class MovieModel extends Model
{
    use HasFactory;

    protected $table = 'movies';

    public function saveMovie(array $data): bool
    {
        $id = $data['id'] ?? 0;
        $title = $data['title'] ?? '';
        $originalTitle = $data['original_title'] ?? '';
        $originalLanguage = $data['original_language'] ?? '';
        $overview = $data['overview'] ?? '';
        $slug = sprintf("%s-%s", $data['id'], Str::slug($data['title'], '-'));
        $posterPath = $data['poster_path'] ?? '';
        $backdropPath = $data['backdrop_path'] ?? '';
        $adult = $data['adult'];
        $video = $data['video'];
        $releaseDate = $data['release_date'];
        $genreIds = $data['genre_ids'] ? json_encode($data['genre_ids']) : '[]';

        if (!$releaseDate) {
            return false;
        }

        return DB::insert(
            'INSERT INTO movies (id, title, original_title, original_language, overview, slug, poster_path, backdrop_path, adult, video, release_date, genre_ids) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON CONFLICT (id) DO NOTHING',
            [
                $id,
                $title,
                $originalTitle,
                $originalLanguage,
                $overview,
                $slug,
                $posterPath,
                $backdropPath,
                $adult,
                $video,
                $releaseDate,
                $genreIds,
            ]
        );
    }

    public function updateMovieDetail(array $movie): bool
    {
        $data = [
            'imdb_id' => $movie['imdb_id'],
            'status' => $movie['status'],
            'runtime' => $movie['runtime'],
            'revenue' => $movie['revenue'],
            'vote_average' => (float) $movie['vote_average'],
            'vote_count' => $movie['vote_count'],
            'production_companies' => '[]',
        ];

        return DB::table($this->table)
            ->where('id', $movie['id'])
            ->update($data);
    }
}
