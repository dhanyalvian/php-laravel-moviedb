<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use App\Http\Controllers\Api\ApiController,
    App\Models\MoviesModel;


class MoviesController extends ApiController
{
    protected function getModel()
    {
        return new MoviesModel();
    }
    
    protected function getResource(array $result): array
    {
        $records = [];

        foreach ($result['results'] as $row) {
            $row["movie_url"] = url('/movies/' . $row['id'] . '-' . Str::slug($row['title'], '-'));
            $row['movie_path'] = sprintf(
                "%s%s%s",
                $this->getUrlMedia(),
                env('TMDB_URL_IMG_THUMBNAIL', ''),
                $row['poster_path']
            );
            $row['movie_release_date'] = date(env('FORMAT_DATE', strtotime($row['release_date'])));
            $records[] = $row;
        }

        $page = (int) $result['page'];

        return [
            'page' => $page,
            'next' => $page + 1,
            'total_pages' => $result['total_pages'],
            'total_records' => $result['total_results'],
            'records' => $records,
        ];
    }
}
