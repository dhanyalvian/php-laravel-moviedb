<?php

namespace App\Http\Controllers\Api\Movie;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\MovieController;


class NowplayingController extends MovieController
{
    public function index(Request $req)
    {
        $this->sLimit($req);
        $page = $this->getPage($req);
        $model = $this->getModel();
        $result = $model->getNowplaying($page);
        $resource = $this->getResource($result);

        return $this->respList(true, $resource);
    }
}
