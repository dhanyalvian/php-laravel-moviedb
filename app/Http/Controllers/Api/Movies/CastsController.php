<?php

namespace App\Http\Controllers\Api\Movies;

use Illuminate\Http\Request,
    Illuminate\Support\Str;
use App\Http\Controllers\Api\MoviesController;

class CastsController extends MoviesController
{
    public function index(string $uid, Request $req)
    {
        $this->sLimit($req);
        $model = $this->getModel();
        $result = $model->getMovieTopCast($uid);
        $resource = $this->getResource($result);

        return $this->respList(true, $resource);
    }

    protected function getResource(array $result): array
    {
        $no = 0;
        $limit = $this->gLimit();
        $records = [];

        foreach ($result['cast'] as $row) {
            if ($limit && $no == $limit) {
                break;
            }
            
            $row["profile_url"] = url('/peoples/' . $row['id'] . '-' . Str::slug($row['name'], '-'));
            
            if ($row['profile_path']) {
                $row['profile_path'] = sprintf(
                    "%s%s%s",
                    $this->getUrlMedia(),
                    env('TMDB_URL_IMG_PROFILE', ''),
                    $row['profile_path']
                );
            } else {
                $row['profile_path'] = '';
            }
            
            $records[] = $row;
            $no++;
        }

        // $page = (int) $result['page'];

        return [
            // 'page' => $page,
            // 'next' => $page + 1,
            // 'total_pages' => $result['total_pages'],
            // 'total_records' => $result['total_results'],
            'records' => $records,
        ];
    }
}
