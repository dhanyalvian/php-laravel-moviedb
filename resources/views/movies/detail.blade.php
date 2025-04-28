<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>Movie Database - {{ $detail['title'] }}</title>
    <link href="{{ asset('css/movies.css') }}" rel="stylesheet">
    <link href="{{ asset('css/peoples/list.css') }}" rel="stylesheet">
    <link href="{{ asset('css/movies/detail.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    {{-- @php($max = 8) --}}

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
                            <a href="#" class="btn btn-outline-secondary" title="Mark as favorite">
                                <span class="bi bi-heart-fill"></span>
                            </a>
                            <a href="#" class="btn btn-outline-secondary" title="Add to your watchlist">
                                <span class="bi bi-bookmark"></span>
                            </a>
                        </div>
                    </div>

                    <div class="others">
                        <div class="row">
                            <div class="col">
                                <h5>Status</h5>
                                <p>{{ $detail['status'] }}</p>
                            </div>
                            <div class="col">
                                @php($budget = ($detail['budget']) ? '$' . number_format($detail['budget']) : '-')
                                <h5>Budget</h5>
                                <p>{{ $budget }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Original Language</h5>
                                <p>{{ $detail['original_language'] }}</p>
                            </div>
                            <div class="col">
                                @php($revenue = ($detail['revenue']) ? '$' . number_format($detail['revenue']) : '-')
                                <h5>Revenue</h5>
                                <p>{{ $revenue }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <div id="top-cast" class="peoples-list border-bottom">
        <div class="container">
            @php($movieSlug = \Illuminate\Support\Str::slug($detail['title'], '-'))
            @php($movieUid = $detail['id'] . '-' . $movieSlug)
            @php($castUrl = url('/movies/' . $movieUid. '/casts'))
            <h2>
                Top Casts
                <a href="{{ $castUrl }}"
                    class="link-more badge rounded-pill text-bg-info"
                    data-url="{{ url('/api/movies/' . $movieUid . '/casts') }}"
                    data-limit="{{ $peopleMax }}">
                    more
                </a>
            </h2>
            
            <div id="page-row" class="row p-2">
                @for ($i = 1; $i <= $peopleMax; $i++)
                    <div class="card card-placeholder d-flex flex-wrap align-items-left">
                        <div class="card-img">
                            <a href="">
                                <img data-original="" class="card-img-top lazyload">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title placeholder-glow">
                                <span class="placeholder col-10"></span>
                            </h5>
                            <p class="card-text">
                                <span class="placeholder col-8"></span>
                            </p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    {{-- <div class="top-cast peoples-list border-bottom">
        <div class="container">
            @php($movieSlug = \Illuminate\Support\Str::slug($detail['title'], '-'))
            @php($castUrl = url('/movies/' . $detail['id'] . '-' . $movieSlug . '/casts'))
            <h2>
                Top Casts
                <a href="{{ $castUrl }}" class="link-more badge rounded-pill text-bg-info">more</a>
            </h2>

            <div class="row p-2">
                @php($no = 1)
                @forelse ($topcast['cast'] as $rec)
                @if($no > $peopleMax) @continue @endif
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
    </div> --}}

    {{-- <div id="movies-recommendations" class=" movies-list">
        <div class="container">
            <h2>
                Recommendations
            </h2>

            <div class="row p-2">
                @php($no = 1)
                @php($maxRecommend = 6)
                @forelse ($recommendations['results'] as $rec)
                @if($no > $maxRecommend) @continue @endif
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
    </div> --}}
    
    <div id="recommendations" class="page-block movies-list lazyload">
        <div class="container">
            <h2>
                Recommendations
            </h2>

            <div id="page-row" class="row p-2">
                @include('movies.placeholder')
            </div>
            
            <div id="page-nav" class="pagination d-grid gap-2 d-none">
                <button id="more-page-btn"
                    class="pagination-more btn btn-outline-secondary rounded-pill"
                    type="button"
                    data-url="{{ url('/api/movies/' . $uid . '/recommendations') }}"
                    data-current-page="1"
                    data-next-page="1"
                    data-limit="{{ $movieMax }}">
                    more
                </button>
            </div>
        </div>
    </div>

    @include('layouts.footer')
    @include('layouts.script')
    
    <script src="{{ asset('js/movies/detail.js') }}" type="text/javascript"></script>
</body>

</html>