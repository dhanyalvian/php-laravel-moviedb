<?php

namespace App\Http\Controllers\Api\Movies;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\MoviesController;


class TopratedController extends MoviesController
{
    public function index(Request $req)
    {
        $page = $this->getPage($req);
        $model = $this->getModel();
        $result = $model->getMoviesTopRated($page);
        $resource = $this->getResource($result);

        return $this->respList(true, $resource);
    }
}
