<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Movies;

class CastsController extends MoviesController
{
    public function list(string $uid): view
    {
        $cfg = $this->getConfigApp();
        $peopleMax = 8;
        $model = new Movies();
        $movie = $model->getMovieDetail($uid);
        $data = compact(
            'uid',
            'cfg',
            'peopleMax',
            'movie',
        );
        
        return view('casts/list', $data);
    }
}
