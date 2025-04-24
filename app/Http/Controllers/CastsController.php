<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Movies;

class CastsController extends MoviesController
{
    public function list(string $uid): view
    {
        $cfg = $this->getConfigApp();
        $model = new Movies();
        $movie = $model->getMovieDetail($uid);
        $casts = $model->getMovieTopCast($uid);
        $data = compact(
            'cfg',
            'movie',
            'casts'
        );
        
        return view('casts/list', $data);
    }
}
