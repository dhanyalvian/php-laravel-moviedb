<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    @include('layouts.header')

    <main class="p-3">
        <div class="container">
            <h2>Now Playing Movies</h2>

            <div class="row p-2 align-items-center">
                @php($max = 6)
                @php($no = 1)
                @forelse ($nowplaying['results'] as $rec)
                    @if($no > $max) @continue @endif
                    <div class="card @if($no == 1) first @endif">
                        <img src="{{ $cfg['url_img_thumbnail'].$rec['poster_path'] }}"
                            class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $rec['original_title'] }}</h5>
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
            <h2>Popular Movies</h2>

            <div class="row p-2 align-items-center">
                @php($no = 1)
                @forelse ($popular['results'] as $rec)
                    @if($no > $max) @continue @endif
                    <div class="card @if($no == 1) first @endif">
                        <img src="{{ $cfg['url_img_thumbnail'].$rec['poster_path'] }}"
                            class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $rec['original_title'] }}</h5>
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
            <h2>Top Rated Movies</h2>

            <div class="row p-2 align-items-center">
                @php($no = 1)
                @forelse ($toprated['results'] as $rec)
                    @if($no > $max) @continue @endif
                    <div class="card @if($no == 1) first @endif">
                        <img src="{{ $cfg['url_img_thumbnail'].$rec['poster_path'] }}"
                            class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $rec['original_title'] }}</h5>
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
            <h2>Upcoming Movies</h2>

            <div class="row p-2 align-items-center">
                @php($no = 1)
                @forelse ($upcoming['results'] as $rec)
                    @if($no > $max) @continue @endif
                    <div class="card @if($no == 1) first @endif">
                        <img src="{{ $cfg['url_img_thumbnail'].$rec['poster_path'] }}"
                            class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $rec['original_title'] }}</h5>
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
</body>

</html>