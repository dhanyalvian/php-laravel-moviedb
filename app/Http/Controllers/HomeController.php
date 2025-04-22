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
        $nowplaying = $model->getMovieNowPlaying($this->getPage());
        $popular = $model->getMoviePopular($this->getPage());
        $toprated = $model->getMovieTopRated($this->getPage());
        $upcoming = $model->getMovieUpcoming($this->getPage());
        $data = compact(
            'cfg',
            'nowplaying',
            'popular',
            'toprated',
            'upcoming',
        );

        return view('home', $data);
    }
    
    private function getPage(int $page = 0): int
    {
        if ($page) {
            return $page;
        }
        
        return rand(1, 10);
    }
}
