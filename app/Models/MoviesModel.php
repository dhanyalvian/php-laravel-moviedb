<?php

namespace App\Models;

class MoviesModel extends Tmdbapi
{
    public function getMoviesPopular(int $page): array
    {
        $ep = 'movie/popular';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }
    
    public function getMoviesNowPlaying(int $page = 1): array
    {
        $ep = 'movie/now_playing';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }
    
    public function getMoviesTopRated(int $page = 1): array
    {
        $ep = 'movie/top_rated';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }
    
    public function getMoviesUpcoming(int $page = 1): array
    {
        $ep = 'movie/upcoming';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }
}
