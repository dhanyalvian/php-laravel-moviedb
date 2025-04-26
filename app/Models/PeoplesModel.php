<?php

namespace App\Models;

class PeoplesModel extends Tmdbapi
{
    public function getPeoplesPopular(int $page): array
    {
        $ep = 'person/popular';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }
}
