<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use App\Http\Controllers\Api\ApiController,
    App\Models\External\MovieModel;


class MovieController extends ApiController
{
    protected function getModel()
    {
        return new MovieModel();
    }

    protected function getResource(array $result): array
    {
        $no = 0;
        $limit = $this->gLimit();
        $records = [];

        foreach ($result['results'] as $row) {
            if ($no == $limit) {
                break;
            }

            $row["movie_url"] = url('/movies/' . $row['id'] . '-' . Str::slug($row['title'], '-'));
            $row['movie_path'] = sprintf(
                "%s%s%s",
                $this->getUrlMedia(),
                env('TMDB_URL_IMG_THUMBNAIL', ''),
                $row['poster_path']
            );
            $row['movie_release_date'] = date(env('FORMAT_DATE'), strtotime($row['release_date']));
            $records[] = $row;
            $no++;
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
