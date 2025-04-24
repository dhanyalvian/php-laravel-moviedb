<?php

namespace App\Http\Controllers;

use Illuminate\View\View,
    Illuminate\Http\Request;
use App\Models\Movies;

class MoviesController extends BaseController
{
    protected function getModel()
    {
        return new Movies();
    }
    
    protected function list(string $title, string $path, array $records)
    {
        $cfg = $this->getConfigApp();
        $maxpage = 500;
        $data = compact(
            'cfg',
            'maxpage',
            'title',
            'path',
            'records'
        );
        
        return view('movies/list', $data);
    }

    public function nowplaying(Request $req): view
    {
        $title = 'Now Playing';
        $path = 'now-playing';
        $model = $this->getModel();
        $records = $model->getMovieNowPlaying($this->getPage($req));
        
        return $this->list($title, $path, $records);
    }
    
    public function popular(Request $req): view
    {
        $title = 'Popular';
        $path = 'popular';
        $model = $this->getModel();
        $records = $model->getMoviePopular($this->getPage($req));
        
        return $this->list($title, $path, $records);
    }
    
    public function toprated(Request $req): view
    {
        $title = 'Top Rated';
        $path = 'top-rated';
        $model = $this->getModel();
        $records = $model->getMovieTopRated($this->getPage($req));
        
        return $this->list($title, $path, $records);
    }
    
    public function upcoming(Request $req): view
    {
        $title = 'Upcoming';
        $path = 'upcoming';
        $model = $this->getModel();
        $records = $model->getMovieUpcoming($this->getPage($req));
        
        return $this->list($title, $path, $records);
    }

    public function detail(string $uid): View
    {
        $cfg = $this->getConfigApp();
        $movie = new Movies();
        $detail = $movie->getMovieDetail($uid);
        $runtime = $this->getMovieRuntime($detail);
        $score = $this->getMovieScore($detail);
        $origin = $this->getMovieOrigin($detail);
        $genres = $this->getMovieGenres($detail);
        $topcast = $movie->getMovieTopCast($uid);
        $data = compact(
            'cfg',
            'detail',
            'runtime',
            'score',
            'origin',
            'genres',
            'topcast'
        );

        return view('movies/detail', $data);
    }

    private function getMovieRuntime(array $detail): string
    {
        $runtime = $detail['runtime'];
        $hours = floor($runtime / 60);
        $min = $runtime - ($hours * 60);

        return $hours . "h " . $min . "m";
    }

    private function getMovieScore(array $detail): int
    {
        return round($detail['vote_average'] * 10, 0);
    }

    private function getMovieOrigin(array $detail): string
    {
        $result = "";

        if ($detail['origin_country']) {
            $result = $detail['origin_country'][0];
        }

        return $result;
    }

    private function getMovieGenres(array $detail): string
    {
        $result = "";
        $data = [];

        foreach ($detail['genres'] as $genre) {
            $data[] = $genre['name'];
        }

        if ($data) {
            $result = implode(', ', $data);
        }

        return $result;
    }
}
