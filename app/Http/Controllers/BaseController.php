<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    protected function getConfigApp(): array
    {
        $tmdbUrlMedia = env('TMDB_URL_MEDIA');
        return [
            'url_img_thumbnail' => $tmdbUrlMedia . env('TMDB_URL_IMG_THUMBNAIL', ''),
            'url_img_detail' => $tmdbUrlMedia . env('TMDB_URL_IMG_DETAIL', ''),
            'url_img_profile' => $tmdbUrlMedia . env('TMDB_URL_IMG_PROFILE', ''),
            'format_date' => env('FORMAT_DATE', ''),
            'format_year' => env('FORMAT_YEAR', ''),
        ];
    }
}
