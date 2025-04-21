<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    @include('layouts.header')
    @php($max = 5)

    <main class="">
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

        <div class="container">
            <h2>
                Popular Movies
                <a href-"#" class="link-more badge rounded-pill text-bg-info">more</a>
            </h2>

            <div class="row p-2">
                @php($no = 1)
                @forelse ($popular['results'] as $rec)
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

        <div class="container">
            <h2>
                Top Rated Movies
                <a href-"#" class="link-more badge rounded-pill text-bg-info">more</a>
            </h2>
            
            <div class="row p-2">
                @php($no = 1)
                @forelse ($toprated['results'] as $rec)
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

        <div class="container">
            <h2>
                Upcoming Movies
                <a href-"#" class="link-more badge rounded-pill text-bg-info">more</a>
            </h2>

            <div class="row p-2">
                @php($no = 1)
                @forelse ($upcoming['results'] as $rec)
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
    </main>

    @include('layouts.footer')
    @include('layouts.script')
</body>

</html>