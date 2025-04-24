<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    
    protected function getPage(Request $req): int
    {
        return $req->input('p') ?? 1;
    }
}
