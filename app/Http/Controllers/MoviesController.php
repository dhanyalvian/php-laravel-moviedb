<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Movies;

class MoviesController extends BaseController
{
    public function list(): view
    {
        return view('movies/list');
    }
    
    public function detail(string $uid): View
    {
        $cfg = $this->getConfigApp();
        $model = new Movies();
        $detail = $model->getMovieDetail($uid);
        $data = compact(
            'cfg',
            'detail',
        );
        
        return view('movies/detail', $data);
    }
}
