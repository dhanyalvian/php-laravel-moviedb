<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Laravel\Prompts\select;

class BaseController extends Controller
{
    const MAX_PAGE = 500;

    protected $limit = 20;
    
    protected function getAppName(): string
    {
        return env('APP_NAME');
    }

    protected function getConfigApp(): array
    {
        $tmdbUrlMedia = env('TMDB_URL_MEDIA');
        return [
            'page_title' => env('APP_NAME'),
            'url_img_thumbnail' => $tmdbUrlMedia . env('TMDB_URL_IMG_THUMBNAIL', ''),
            'url_img_detail' => $tmdbUrlMedia . env('TMDB_URL_IMG_DETAIL', ''),
            'url_img_detail_mini' => $tmdbUrlMedia . env('TMDB_URL_IMG_DETAIL_MINI', ''),
            'url_img_profile' => $tmdbUrlMedia . env('TMDB_URL_IMG_PROFILE', ''),
            'format_date' => env('FORMAT_DATE', ''),
            'format_year' => env('FORMAT_YEAR', ''),
        ];
    }

    protected function getUrlMedia(): string
    {
        return env('TMDB_URL_MEDIA', '');
    }

    protected function getNavMenu(string $ep, string $path): array
    {
        return [
            'ep' => $ep,
            'path' => $path,
            'menu' => [
                [
                    'path' => 'movies',
                    'title' => 'Movies',
                    'childs' => [
                        [
                            'path' => 'popular',
                            'title' => 'Popular',
                            'url' => url('/movies/popular'),
                        ],
                        [
                            'path' => 'now-playing',
                            'title' => 'Now Playing',
                            'url' => url('/movies/now-playing'),
                        ],
                        [
                            'path' => 'upcoming',
                            'title' => 'Upcoming',
                            'url' => url('/movies/upcoming'),
                        ],
                        [
                            'path' => 'top-rated',
                            'title' => 'Top Rated',
                            'url' => url('/movies/top-rated'),
                        ],
                    ],
                ],
                [
                    'path' => 'peoples',
                    'title' => 'Peoples',
                    'childs' => [
                        [
                            'path' => 'popular',
                            'title' => 'Popular',
                            'url' => url('/peoples/popular'),
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getPage(Request $req): int
    {
        return $req->input('p') ?? 1;
    }

    protected function getPageMax(): int
    {
        return self::MAX_PAGE;
    }

    protected function getLimit(Request $req): int
    {
        return $req->input('l') ?? 20;
    }

    protected function sLimit(Request $req): void
    {
        $this->limit = $this->getLimit($req);
    }

    protected function gLimit(): int
    {
        return $this->limit;
    }
}
