<?php

namespace App\Http\Controllers\Api\Movies;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\MoviesController;


class PopularController extends MoviesController
{
    public function index(Request $req)
    {
        $page = $this->getPage($req);
        $model = $this->getModel();
        $result = $model->getMoviesPopular($page);
        $resource = $this->getResource($result);

        return $this->respList(true, $resource);
    }
}
