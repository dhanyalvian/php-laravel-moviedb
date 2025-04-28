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

        <main id="movies-list" class="movies-list">
            <div class="container">
                <h2>
                    {{ $title }} Movies
                </h2>

                <div id="page-row" class="row p-2">
                    @include('movies.placeholder')
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
            </div>
        </main>

        @include('layouts.footer')
        @include('layouts.script')
        
        <script src="{{ asset('js/movies/list.js') }}" type="text/javascript"></script>
    </body>

</html>