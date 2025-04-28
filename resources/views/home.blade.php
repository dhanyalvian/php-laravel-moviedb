<!doctype html>
<html lang="en">

    <head>
        @include('layouts.head')
        <title>Movie Database</title>
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
                        data-url="{{ url('/api/movies/popular') }}"
                        data-current-page="1"
                        data-next-page="1"
                        data-limit="{{ $movieMax }}">
                        more
                    </a>
                </h2>

                <div class="page-row row p-2">
                    @include('movies.placeholder')
                </div>
            </div>
            
            {{-- <div class="container">
                <h2>
                    Popular Movies
                    <a href="{{ url('/movies/popular') }}"
                        class="link-more badge rounded-pill text-bg-info">more</a>
                </h2>

                <div class="row p-2">
                    @php($no = 1)
                    @forelse ($popular['results'] as $rec)
                    @if($no > $max) @continue @endif
                    @php($slug = \Illuminate\Support\Str::slug($rec['title'], '-'))
                    @php($movieUrl = url('/movies/' . $rec['id'] . '-' . $slug))
                    @php($movieTitle = $rec['title'])
                    <div class="card d-flex flex-wrap align-items-left">
                        <div class="card-img">
                            <a href="{{ $movieUrl }}">
                                <img data-original="{{ $cfg['url_img_thumbnail'] . $rec['poster_path'] }}"
                                    class="card-img-top lazyload" alt="{{ $movieTitle }}">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ $movieUrl }}">
                                    {{ $movieTitle }}
                                </a>
                            </h5>
                            <p class="card-text">
                                {{ date($cfg['format_date'], strtotime($rec['release_date'])) }}
                            </p>
                        </div>
                    </div>
                    @php($no++)
                    @empty
                    <div class="alert alert-danger">
                        Data belum Tersedia.
                    </div>
                    @endforelse
                </div>
            </div>
            
            <div class="container">
                <h2>
                    Now Playing Movies
                    <a href="{{ url('/movies/now-playing') }}"
                        class="link-more badge rounded-pill text-bg-info">more</a>
                </h2>

                <div class="row p-2">
                    @php($no = 1)
                    @forelse ($nowplaying['results'] as $rec)
                    @if($no > $max) @continue @endif
                    @php($slug = \Illuminate\Support\Str::slug($rec['title'], '-'))
                    @php($movieUrl = url('/movies/' . $rec['id'] . '-' . $slug))
                    @php($movieTitle = $rec['title'])
                    <div class="card d-flex flex-wrap align-items-left">
                        <div class="card-img">
                            <a href="{{ $movieUrl }}">
                                <img data-original="{{ $cfg['url_img_thumbnail'] . $rec['poster_path'] }}"
                                    class="card-img-top lazyload" alt="{{ $movieTitle }}">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ $movieUrl }}">
                                    {{ $movieTitle }}
                                </a>
                            </h5>
                            <p class="card-text">
                                {{ date($cfg['format_date'], strtotime($rec['release_date'])) }}
                            </p>
                        </div>
                    </div>
                    @php($no++)
                    @empty
                    <div class="alert alert-danger">
                        Data belum Tersedia.
                    </div>
                    @endforelse
                </div>
            </div>

            <div class="container">
                <h2>
                    Top Rated Movies
                    <a href="{{ url('/movies/top-rated') }}"
                        class="link-more badge rounded-pill text-bg-info">more</a>
                </h2>

                <div class="row p-2">
                    @php($no = 1)
                    @forelse ($toprated['results'] as $rec)
                    @if($no > $max) @continue @endif
                    @php($slug = \Illuminate\Support\Str::slug($rec['title'], '-'))
                    @php($movieUrl = url('/movies/' . $rec['id'] . '-' . $slug))
                    @php($movieTitle = $rec['title'])
                    <div class="card d-flex flex-wrap align-items-left">
                        <div class="card-img">
                            <a href="{{ $movieUrl }}">
                                <img data-original="{{ $cfg['url_img_thumbnail'] . $rec['poster_path'] }}"
                                    class="card-img-top lazyload" alt="{{ $movieTitle }}">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ $movieUrl }}">
                                    {{ $movieTitle }}
                                </a>
                            </h5>
                            <p class="card-text">
                                {{ date($cfg['format_date'], strtotime($rec['release_date'])) }}
                            </p>
                        </div>
                    </div>
                    @php($no++)
                    @empty
                    <div class="alert alert-danger">
                        Data belum Tersedia.
                    </div>
                    @endforelse
                </div>
            </div>

            <div class="container">
                <h2>
                    Upcoming Movies
                    <a href="{{ url('/movies/upcoming') }}"
                        class="link-more badge rounded-pill text-bg-info">more</a>
                </h2>

                <div class="row p-2">
                    @php($no = 1)
                    @forelse ($upcoming['results'] as $rec)
                    @if($no > $max) @continue @endif
                    @php($slug = \Illuminate\Support\Str::slug($rec['title'], '-'))
                    @php($movieUrl = url('/movies/' . $rec['id'] . '-' . $slug))
                    @php($movieTitle = $rec['title'])
                    <div class="card d-flex flex-wrap align-items-left">
                        <div class="card-img">
                            <a href="{{ $movieUrl }}">
                                <img data-original="{{ $cfg['url_img_thumbnail'] . $rec['poster_path'] }}"
                                    class="card-img-top lazyload" alt="{{ $movieTitle }}">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ $movieUrl }}">
                                    {{ $movieTitle }}
                                </a>
                            </h5>
                            <p class="card-text">
                                {{ date($cfg['format_date'], strtotime($rec['release_date'])) }}
                            </p>
                        </div>
                    </div>
                    @php($no++)
                    @empty
                    <div class="alert alert-danger">
                        Data belum Tersedia.
                    </div>
                    @endforelse
                </div>
            </div> --}}
        </div>
        
        <div id="nowplaying-movies" class="page-block block-next movies-list">
            <div class="container">
                <h2>
                    Now Playing Movies
                    <a href="{{ url('/movies/now-playing') }}"
                        class="link-more badge rounded-pill text-bg-info"
                        data-url="{{ url('/api/movies/now-playing') }}"
                        data-current-page="1"
                        data-next-page="1"
                        data-limit="{{ $movieMax }}">
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
                        data-url="{{ url('/api/movies/top-rated') }}"
                        data-current-page="1"
                        data-next-page="1"
                        data-limit="{{ $movieMax }}">
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
                        data-url="{{ url('/api/movies/upcoming') }}"
                        data-current-page="1"
                        data-next-page="1"
                        data-limit="{{ $movieMax }}">
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