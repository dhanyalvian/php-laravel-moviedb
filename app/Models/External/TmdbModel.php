<?php

namespace App\Models\External;

use Illuminate\Support\Facades\Http;

class TmdbModel
{
    protected $apiUrl = '';
    protected $headers = [];

    public function __construct()
    {
        $this->apiUrl = env('TMDB_URL_API', '');
        $this->headers['Authorization'] = sprintf('Bearer %s', env('TMDB_TOKEN', ''));
    }

    public function get(string $ep, array $query = []): array
    {
        $result = [];
        $url = sprintf('%s/%s', $this->apiUrl, $ep);
        $response = Http::withHeaders($this->headers)->get($url, $query);

        if ($response) {
            $result = json_decode($response->body(), true);
        }

        return $result;
    }

    protected function getQueryString(int $page): array
    {
        return [
            'page' => $page,
            'language' => 'en-US',
            'include_adult' => 'false',
        ];
    }
}
