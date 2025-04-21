<?php

namespace App\Models;

class Home extends Tmdbapi
{
    public function getMovieNowPlaying(int $page = 1): array
    {
        $ep = 'movie/now_playing';
        $query = $this->getQueryString($page);
        
        return $this->get($ep, $query);
    }
}
