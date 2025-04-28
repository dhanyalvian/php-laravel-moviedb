<?php

namespace App\Http\Controllers\Api\Movies;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\MoviesController;


class RecommendationsController extends MoviesController
{
    public function index(string $uid, Request $req)
    {
        $this->sLimit($req);
        $model = $this->getModel();
        $result = $model->getMoviesRecommendation($uid);
        $resource = $this->getResource($result);

        return $this->respList(true, $resource);
    }
}
