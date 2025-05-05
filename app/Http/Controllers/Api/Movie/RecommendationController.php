<?php

namespace App\Http\Controllers\Api\Movie;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\MovieController;


class RecommendationController extends MovieController
{
    public function index(string $uid, Request $req)
    {
        $this->sLimit($req);
        $model = $this->getModel();
        $result = $model->getRecommendation($uid);
        $resource = $this->getResource($result);

        return $this->respList(true, $resource);
    }
}
