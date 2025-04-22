<!doctype html>
<html lang="en">

    <head>
        @include('layouts.head')
        <link href="{{ asset('css/movie_detail.css') }}" rel="stylesheet">
    </head>

    <body>
        @include('layouts.header')
        @php($max = 6)

        <main class="movies-detail border-bottom">
            <div class="container">
                <div class="d-flex flex-row">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{ $cfg['url_img_detail'] . $detail['poster_path'] }}"
                                class="poster card-img-top lazyload" alt="{{ $detail['original_title'] }}">
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

                        <div class="info-part btn-group btn-group-sm" role="group">
                            @if($score)
                                <span class="btn btn btn-outline-secondary active">{{ $score }}<sup>%</sup></span>
                            @endif
                            <span
                                class="btn btn btn-outline-secondary">{{ date($cfg['format_date'], strtotime($detail['release_date'])) }}
                                @if($origin) ({{ $origin }}) @endif</span>
                            <span class="btn btn btn-outline-secondary">{{ $genres }}</span>
                            <span class="btn btn btn-outline-secondary">{{ $runtime }}</span>
                        </div>

                        <div class="overview">
                            <h3>Overview</h3>
                            <p>{{ $detail['overview'] }}</p>
                        </div>

                        <div class="action">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="#" class="btn btn-outline-secondary" title="Add to list">
                                    <span class="bi bi-list-check"></span>
                                </a>
                                <a href="#" class="btn btn-outline-secondary active" title="Mark as favorite">
                                    <span class="bi bi-heart-fill"></span>
                                </a>
                                <a href="#" class="btn btn-outline-secondary active" title="Add to your watchlist">
                                    <span class="bi bi-bookmark-fill"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div>
            <div class="container">
                <h2>
                    Now Playing Movies
                    <a href-"#" class="link-more badge rounded-pill text-bg-info">more</a>
                </h2>

                <div class="row p-2">
                    @php($no = 1)
                    @forelse ($nowplaying['results'] as $rec)
                    @if($no > $max) @continue @endif
                    @php($movieUrl = url('/movies/' . $rec['id']))
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
        </div>

        @include('layouts.footer')
        @include('layouts.script')
    </body>

</html>