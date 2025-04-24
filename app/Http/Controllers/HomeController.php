<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Home;

class HomeController extends BaseController
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $cfg = $this->getConfigApp();
        $model = new Home();
        $nowplaying = $model->getMovieNowPlaying();
        $popular = $model->getMoviePopular();
        $toprated = $model->getMovieTopRated();
        $upcoming = $model->getMovieUpcoming();
        $data = compact(
            'cfg',
            'nowplaying',
            'popular',
            'toprated',
            'upcoming',
        );

        return view('home', $data);
    }
}
