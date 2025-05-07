<!doctype html>
<html lang="en">

    <head>
        @include('layouts.head')
        <title>{{ $cfg['page_title'] }}</title>
        <link href="{{ asset('css/movies.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    </head>

    <body>
        @include('layouts.header')
        {{-- @php($max = 6) --}}

        <div id="popular-movies" class="page-block movies-list">
            <div class="container">
                <h2>
                    Popular Movies
                    <a href="{{ url('/movies/popular') }}"
                        class="link-more badge rounded-pill text-bg-info"
                        {{-- data-url="{{ url('/api/movies/popular') }}" --}}
                        data-url="{{ $cfg['url_api'] . '/movies/popular' }}"
                        data-current-page="1"
                        data-next-page="1"
                        data-limit="{{ $limit }}">
                        more
                    </a>
                </h2>

                <div class="page-row row p-2">
                    @include('movies.placeholder')
                </div>
            </div>
        </div>
        
        <div id="nowplaying-movies" class="page-block block-next movies-list">
            <div class="container">
                <h2>
                    Now Playing Movies
                    <a href="{{ url('/movies/now-playing') }}"
                        class="link-more badge rounded-pill text-bg-info"
                        {{-- data-url="{{ url('/api/movies/now-playing') }}" --}}
                        data-url="{{ $cfg['url_api'] . '/movies/now-playing' }}"
                        data-current-page="1"
                        data-next-page="1"
                        data-limit="{{ $limit }}">
                        more
                    </a>
                </h2>

                <div class="page-row row p-2">
                    @include('movies.placeholder')
                </div>
            </div>
        </div>
        
        <div id="upcoming-movies" class="page-block block-next movies-list">
            <div class="container">
                <h2>
                    Upcoming Movies
                    <a href="{{ url('/movies/upcoming') }}"
                        class="link-more badge rounded-pill text-bg-info"
                        {{-- data-url="{{ url('/api/movies/upcoming') }}" --}}
                        data-url="{{ $cfg['url_api'] . '/movies/upcoming' }}"
                        data-current-page="1"
                        data-next-page="1"
                        data-limit="{{ $limit }}">
                        more
                    </a>
                </h2>

                <div class="page-row row p-2">
                    @include('movies.placeholder')
                </div>
            </div>
        </div>
        
        <div id="toprated-movies" class="page-block block-next movies-list">
            <div class="container">
                <h2>
                    Top Rated Movies
                    <a href="{{ url('/movies/top-rated') }}"
                        class="link-more badge rounded-pill text-bg-info"
                        {{-- data-url="{{ url('/api/movies/top-rated') }}" --}}
                        data-url="{{ $cfg['url_api'] . '/movies/top-rated' }}"
                        data-current-page="1"
                        data-next-page="1"
                        data-limit="{{ $limit }}">
                        more
                    </a>
                </h2>

                <div class="page-row row p-2">
                    @include('movies.placeholder')
                </div>
            </div>
        </div>

        @include('layouts.footer')
        @include('layouts.script')
        
        <script src="{{ asset('js/movie.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/home.js') }}" type="text/javascript"></script>
    </body>

</html>