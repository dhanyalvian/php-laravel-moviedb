<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;

class Tmdbapi
{
    protected $apiUrl = '';
    protected $headers = [];
    
    public function __construct()
    {
        $this->apiUrl = env('TMDB_URL_API', '');
        $this->headers['Authorization'] = sprintf('Bearer %s', env('TMDB_TOKEN', ''));
    }
    
    public function get(string $ep, array $query): array
    {
        $result = [];
        $url = sprintf('%s/%s', $this->apiUrl, $ep);
        $response = Http::withHeaders($this->headers)->get($url, $query);
        
        if ($response) {
            $result = json_decode($response->body(), true);
        }

        return $result;
    }

    public function getMovieNowPlaying(int $page = 1): array
    {
        $ep = 'movie/now_playing';
        $query = [
            'page' => $page,
        ];
        
        return $this->get($ep, $query);
    }
    
    public function getMoviePopular(int $page = 1): array
    {
        $ep = 'movie/popular';
        $query = [
            'page' => $page,
        ];
        
        return $this->get($ep, $query);
    }
    
    public function getMovieTopRated(int $page = 1): array
    {
        $ep = 'movie/top_rated';
        $query = [
            'page' => $page,
        ];
        
        return $this->get($ep, $query);
    }
    
    public function getMovieUpcoming(int $page = 1): array
    {
        $ep = 'movie/upcoming';
        $query = [
            'page' => $page,
        ];
        
        return $this->get($ep, $query);
    }
}
