<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
    <link href="{{ asset('css/movie_detail.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')

    <main class="movies-detail">
        <div class="container">
            <div class="d-flex flex-row">
                <div class="card rounded-3">
                    <div class="card-img">
                        <img src="{{ $cfg['url_img_detail'] . $detail['poster_path'] }}"
                            class="poster card-img-top lazyload rounded-top" alt="{{ $detail['original_title'] }}">
                    </div>
                    <div class="card-body">
                        <p class="card-text tagline">
                            @if($detail['tagline'])
                                {{ $detail['tagline'] }}
                            @else
                                {{ $detail['title'] }}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="information">
                    <h2>{{ $detail['title'] }} ({{ date($cfg['format_year'], strtotime($detail['release_date'])) }})
                    </h2>

                    <div class="info-part btn-group btn-group-sm rounded" role="group" aria-label="Small button group">
                        @if($score)
                            <button type="button" class="btn btn btn-outline-secondary active">{{ $score }}<sup>%</sup></button>
                        @endif
                        <button type="button" class="btn btn btn-outline-secondary">{{ date($cfg['format_date'], strtotime($detail['release_date'])) }} @if($origin) ({{ $origin }}) @endif</button>
                        <button type="button" class="btn btn btn-outline-secondary">{{ $genres }}</button>
                        <button type="button" class="btn btn btn-outline-secondary">{{ $runtime }}</button>
                    </div>
                    {{-- <div class="info-part">{{ $genres . ' | ' . $runtime }}</div> --}}
                    {{-- <div class="tagline">{{ $detail['tagline'] }}</div> --}}
                    <div class="overview">
                        <h3>Overview</h3>
                        <p>{{ $detail['overview'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- <style type="text/css?">
            main.movies-detail {
                background-image: url(https://media.themoviedb.org/t/p/w1920_and_h800_multi_faces/is9bmV6uYXu7LjZGJczxrjJDlv8.jpg);
            }
        </style> -->

    @include('layouts.footer')
    @include('layouts.script')
</body>

</html>