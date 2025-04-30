<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>{{ $cfg['page_title'] }} - {{ $movie['title'] }} - Casts</title>
    <link href="{{ asset('css/peoples/list.css') }}" rel="stylesheet">
    <link href="{{ asset('css/casts.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')

    <div class="mini-detail border-bottom">
        <div class="container d-flex flex-row">
            <div class="movie-img">
                <img src="{{ $cfg['url_img_detail_mini'] . $movie['poster_path'] }}"
                    class="poster w-full card-img-top lazyload" alt="{{ $movie['original_title'] }}">

            </div>
            <div class="movie-title">
                @php($backUrl = rtrim(Illuminate\Support\Facades\URL::current(), '/casts'))
                <h2>{{ $movie['title'] }} ({{ date($cfg['format_year'], strtotime($movie['release_date'])) }})</h2>
                <h5>
                    <span class="back2detail">
                        &laquo; <a href="{{ $backUrl }}">back to Detail</a>
                    </span>
                </h5>
            </div>
        </div>
    </div>

    <div id="top-cast" class="casts peoples-list">
        <div class="container">
            <h2>Top Casts</h2>
            
            <div class="link-more d-none"
                data-url="{{ url('/api/movies/' . $uid . '/casts') }}"
                data-limit="0">
            </div>
            
            <div id="page-row" class="row p-2">
                @include('peoples.placeholder')
            </div>
        </div>
    </div>

    @include('layouts.footer')
    @include('layouts.script')
    
    <script src="{{ asset('js/movies/casts.js') }}" type="text/javascript"></script>
</body>

</html>