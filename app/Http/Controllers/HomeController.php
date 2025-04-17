<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Home;

class HomeController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $cfg = [
            'url_img_thumbnail' => env('TMDB_URL_IMG_THUMBNAIL', ''),
            'format_date' => env('FORMAT_DATE', ''),
        ];
        $home = new Home();
        $nowplaying = $home->getMovieNowPlaying(rand(1, 10));
        $popular = $home->getMoviePopular(rand(1, 10));
        $toprated = $home->getMovieTopRated(rand(1, 10));
        $upcoming = $home->getMovieUpcoming(rand(1, 10));
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
