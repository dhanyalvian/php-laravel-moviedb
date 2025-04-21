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
        $runtime = $this->getMovieRuntime($detail);
        $score = $this->getMovieScore($detail);
        $origin = $this->getMovieOrigin($detail);
        $genres = $this->getMovieGenres($detail);
        $data = compact(
            'cfg',
            'detail',
            'runtime',
            'score',
            'origin',
            'genres'
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
