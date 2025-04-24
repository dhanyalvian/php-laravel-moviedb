<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>Movie Database - {{ $movie['title'] }} - Casts</title>
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
                <h5><a href="{{ $backUrl }}">&laquo; back to Detail</a></h5>
            </div>
        </div>
    </div>

    <div class="casts peoples-list">
        <div class="container">
            <h2>
                Top Casts
                <a href-"#" class="link-more badge rounded-pill text-bg-info">more</a>
            </h2>

            <div class="row p-2">
                @php($no = 1)
                @forelse ($casts['cast'] as $rec)
                @php($castUrl = url('/movies/' . $rec['id']))
                @php($castName = $rec['name'])
                @php($photoProfile = $rec['profile_path'] ? $cfg['url_img_profile'] . $rec['profile_path'] : '')
                <div class="card d-flex flex-wrap align-items-left">
                    <div class="card-img">
                        <a href="{{ $castUrl }}">
                            <img data-original="{{ $photoProfile }}" class="card-img-top lazyload"
                                alt="{{ $castName }}">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ $castUrl }}">
                                {{ $castName }}
                            </a>
                        </h5>
                        <p class="card-text">
                            {{ $rec['character'] }}
                        </p>
                    </div>
                </div>
                @php($no++)
                @empty
                <div class="alert alert-danger">
                    We don't have any cast added to this movie. You can help by adding some!
                </div>
                @endforelse
            </div>
        </div>
    </div>

    @include('layouts.footer')
    @include('layouts.script')
</body>

</html>