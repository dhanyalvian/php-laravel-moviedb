<?php

namespace App\Models;

class Movies extends Tmdbapi
{
    public function getMovieNowPlaying(int $page = 1): array
    {
        $ep = 'movie/now_playing';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }

    public function getMoviePopular(int $page = 1): array
    {
        $ep = 'movie/popular';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }

    public function getMovieTopRated(int $page = 1): array
    {
        $ep = 'movie/top_rated';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }

    public function getMovieUpcoming(int $page = 1): array
    {
        $ep = 'movie/upcoming';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }

    public function getMovieDetail(string $uid): array
    {
        $ep = 'movie/' . $uid;

        return $this->get($ep);
    }

    public function getMovieTopCast(string $uid): array
    {
        $ep = 'movie/' . $uid . '/credits';

        return $this->get($ep);
    }
    
    public function getMovieRecommendations(string $uid): array
    {
        $ep = 'movie/' . $uid . '/recommendations';

        return $this->get($ep);
    }
}
