<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\External\MovieModel;

class CastController extends MovieController
{
    protected function getModel()
    {
        return new MovieModel();
    }

    public function list(string $uid): view
    {
        $cfg = $this->getConfigApp();
        $nav = $this->getNavMenu('movies', '');
        $peopleMax = 8;
        $model = $this->getModel();
        $movie = $model->getDetail($uid);
        $data = compact(
            'uid',
            'cfg',
            'nav',
            'peopleMax',
            'movie',
        );

        return view('casts/list', $data);
    }
}
