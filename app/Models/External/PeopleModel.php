<?php

namespace App\Models\External;

class PeopleModel extends TmdbModel
{
    public function getPeoplesPopular(int $page): array
    {
        $ep = 'person/popular';
        $query = $this->getQueryString($page);

        return $this->get($ep, $query);
    }
}
