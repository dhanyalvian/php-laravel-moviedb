<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>{{ $cfg['page_title'] }} - {{ $title }}</title>
    <link href="{{ asset('css/casts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/peoples/list.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')

    <main id="peoples-list" class="peoples-list">
        <div class="container">
            <h2>
                {{ $title }}
            </h2>
            
            <div id="page-row" class="row p-2">
                @for ($i = 1; $i <= 8; $i++)
                    <div class="card card-placeholder d-flex flex-wrap align-items-left">
                        <div class="card-img">
                            <a href="">
                                <img data-original="" class="card-img-top lazyload">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title placeholder-glow">
                                <span class="placeholder col-6"></span>
                            </h5>
                            <p class="card-text">
                                <span class="placeholder col-7"></span>
                                <span class="placeholder col-4"></span>
                                <span class="placeholder col-4"></span>
                                <span class="placeholder col-6"></span>
                            </p>
                        </div>
                    </div>
                @endfor
            </div>

            <div id="page-nav" class="pagination d-grid gap-2 d-none">
                <button id="more-page-btn"
                    class="pagination-more btn btn-outline-secondary rounded-pill"
                    type="button"
                    data-url="{{ url('/api/peoples/popular') }}"
                    data-current-page="1"
                    data-next-page="1">
                    more
                </button>
            </div>
        </div>
    </main>

    @include('layouts.footer')
    @include('layouts.script')

    <script src="{{ asset('js/peoples/list.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            getPeopleRecords(1, 0);
        });
    </script>
</body>

</html>