<?php

namespace App\Models\External;

class MovieModel extends TmdbModel
{
    public function getPopular(int $page): array
    {
        $ep = 'movie/popular';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }

    public function getNowPlaying(int $page = 1): array
    {
        $ep = 'movie/now_playing';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }

    public function getUpcoming(int $page = 1): array
    {
        $ep = 'movie/upcoming';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }

    public function getTopRated(int $page = 1): array
    {
        $ep = 'movie/top_rated';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }

    public function getDetail(string $uid): array
    {
        $ep = 'movie/' . $uid;

        return $this->get($ep);
    }

    public function getTopCast(string $uid): array
    {
        $ep = 'movie/' . $uid . '/credits';

        return $this->get($ep);
    }

    public function getRecommendation(string $uid): array
    {
        $ep = sprintf("movie/%s/recommendations", $uid);

        return $this->get($ep);
    }
}
