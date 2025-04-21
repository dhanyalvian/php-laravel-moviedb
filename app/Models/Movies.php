<?php

namespace App\Models;

class Movies extends Tmdbapi
{
    public function getMovieDetail(string $uid): array
    {
        $ep = 'movie/' . $uid;

        return $this->get($ep);
    }
}
