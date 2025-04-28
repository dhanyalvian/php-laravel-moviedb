<!doctype html>
<html lang="en">

    <head>
        @include('layouts.head')
        <title>{{ $cfg['page_title'] }} - {{ $title }} Movies</title>
        <link href="{{ asset('css/movies.css') }}" rel="stylesheet">
        <link href="{{ asset('css/movies/list.css') }}" rel="stylesheet">
    </head>

    <body>
        @include('layouts.header')
        @php($max = 20)

        <main id="movies-list" class="movies-list">
            <div class="container">
                <h2>
                    {{ $title }} Movies
                </h2>

                <div id="page-row" class="row p-2">
                    @for ($i = 1; $i <= 6; $i++)
                    <div class="card card-placeholder d-flex flex-wrap align-items-left">
                        <div class="card-img">
                            <a href="">
                                <img data-original="" class="card-img-top lazyload">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title placeholder-glow">
                                <span class="placeholder col-8"></span>
                            </h5>
                            <p class="card-text">
                                <span class="placeholder col-5"></span>
                            </p>
                        </div>
                    </div>
                @endfor
                    {{-- @php($no = 1)
                    @forelse ($records['results'] as $rec)
                    @if($no > $max) @continue @endif
                    @php($movieSlug = \Illuminate\Support\Str::slug($rec['title'], '-'))
                    @php($movieUrl = url('/movies/' . $rec['id'] . '-' . $movieSlug))
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
                    @endforelse --}}
                </div>
                
                <div id="page-nav" class="pagination d-grid gap-2 d-none">
                    <button id="more-page-btn"
                        class="pagination-more btn btn-outline-secondary rounded-pill"
                        type="button"
                        data-url="{{ url('/api/movies/' . $path) }}"
                        data-current-page="1"
                        data-next-page="1">
                        more
                    </button>
                </div>

                <!-- <div class="pagination d-grid gap-2">
                    @php($currPage = $records['page'])
                    @php($lastPage = $records['total_pages'] > $maxpage ? $maxpage : $records['total_pages'])
                    @php($nextPage = $currPage + 1)
                    <button class="btn btn-outline-secondary rounded-pill"
                        type="button"
                        data-current-page="{{ $currPage }}"
                        data-next-page="{{ $nextPage }}">
                        Load more
                    </button>
                </div> -->

                {{-- <nav aria-label="page-navigation">
                    <ul class="pagination justify-content-center">
                        @php($paginationUrl = url('/movies/' . $path . '?p='))
                        @php($currPage = $records['page'])
                        @php($lastPage = $records['total_pages'] > $maxpage ? $maxpage : $records['total_pages'])

                        <li class="page-item">
                            <a class="page-link @if($currPage == 1) disabled @endif" href="{{ $paginationUrl . '1' }}"
                                aria-label="First">
                                <span aria-hidden="true">First</span>
                            </a>
                        </li>
                        <li class="page-item">
                            @php($prevPage = $currPage - 1)
                            <a class="page-link @if($currPage == 1) disabled @endif"
                                href="{{ $paginationUrl . $prevPage }}" aria-label="Previous">
                                <span aria-hidden="true">Previous</span>
                            </a>
                        </li>

                        @php($min = max(1, $currPage - 2))
                        @php($max = $min == 1 ? 5 : min($lastPage, $currPage + 2))
                        @php($min = ($max - $min != 5) ? $max - 4 : $min)

                        @for ($i = $min; $i <= $max; $i++)
                            <li class="page-item {{ $i == $currPage ? 'active' : '' }}">
                                <a class="page-link" href="{{ $paginationUrl . $i }}">{{ $i }}</a>

                            </li>
                        @endfor

                        <li class="page-item">
                            @php($nextPage = $currPage + 1)
                            <a class="page-link @if($currPage == $lastPage) disabled @endif"
                                href="{{ $paginationUrl . $nextPage }}" aria-label="Next">
                                <span aria-hidden="true">Next</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link @if($currPage == $lastPage) disabled @endif"
                                href="{{ $paginationUrl . $lastPage }}" aria-label="Next">
                                <span aria-hidden="true">Last</span>
                            </a>
                        </li>
                    </ul>
                </nav> --}}
            </div>
        </main>

        @include('layouts.footer')
        @include('layouts.script')
        
        <script src="{{ asset('js/movies/list.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                getMovieRecords(1, 0);
            });
        </script>
    </body>

</html>