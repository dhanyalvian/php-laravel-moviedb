<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request,
Illuminate\Support\Str;
use App\Models\PeoplesModel;

class PeoplesController extends ApiController
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
