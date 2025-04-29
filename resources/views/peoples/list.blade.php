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
                @include('peoples.placeholder')
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