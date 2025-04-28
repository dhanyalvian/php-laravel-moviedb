<?php

namespace App\Http\Controllers\Api\Peoples;

use Illuminate\Http\Request,
    Illuminate\Support\Str;
use App\Http\Controllers\Api\ApiController,
    App\Models\PeoplesModel;

class PopularController extends ApiController
{
    protected function getModel()
    {
        return new PeoplesModel();
    }

    public function index(Request $req)
    {
        $page = $this->getPage($req);
        $model = $this->getModel();
        $result = $model->getPeoplesPopular($page);
        $resource = $this->getResource($result);

        return $this->respList(true, $resource);
    }

    protected function getResource(array $result): array
    {
        $records = [];

        foreach ($result['results'] as $row) {
            $row["profile_url"] = url('/peoples/' . $row['id'] . '-' . Str::slug($row['name'], '-'));
            $row['profile_path'] = sprintf(
                "%s%s%s",
                $this->getUrlMedia(),
                env('TMDB_URL_IMG_PROFILE', ''),
                $row['profile_path']
            );
            $row['profile_known_for'] = $this->getProfileKnownFor($row['known_for']);
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

    protected function getProfileKnownFor(array $rows): string
    {
        $result = [];

        foreach ($rows as $row) {
            $result[] = $row['media_type'] == 'movie' ? $row['title'] : $row['original_name'];

        }

        return implode(', ', $result);
    }
}
