<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    @php($max = 6)

    <main class="movie-list">
        <div class="container">
            <h2>
                Now Playing Movies
                <a href-"#" class="link-more badge rounded-pill text-bg-info">more</a>
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
                Popular Movies
                <a href-"#" class="link-more badge rounded-pill text-bg-info">more</a>
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
                Top Rated Movies
                <a href-"#" class="link-more badge rounded-pill text-bg-info">more</a>
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
                <a href-"#" class="link-more badge rounded-pill text-bg-info">more</a>
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
        </div>
    </main>

    @include('layouts.footer')
    @include('layouts.script')
</body>

</html>