<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>Movie Database - {{ $title }}</title>
    <link href="{{ asset('css/casts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/peoples/list.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')

    <main class="peoples-list">
        <div class="container">
            <h2>
                {{ $title }}
            </h2>
            
            <div class="row p-2"></div>

            {{-- <div class="row p-2">
                @php($no = 1)
                @forelse ($records['results'] as $rec)
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
                            {{ $rec['original_name'] }}
                        </p>
                    </div>
                </div>
                @php($no++)
                @empty
                <div class="alert alert-danger">
                    We don't have any cast added to this movie. You can help by adding some!
                </div>
                @endforelse
            </div> --}}

            <div id="page-nav" class="pagination d-grid gap-2 d-none">
                @php($currPage = $records['page'])
                @php($lastPage = $records['total_pages'] > $maxpage ? $maxpage : $records['total_pages'])
                @php($nextPage = $currPage + 1)
                <button id="more-page-btn" class="pagination-more btn btn-outline-secondary rounded-pill" type="button"
                    data-current-page="{{ $currPage }}" data-next-page="{{ $nextPage }}">
                    more
                </button>
            </div>

            {{-- <nav aria-label="page-navigation">
                <ul class="pagination justify-content-center">
                    @php($paginationUrl = url('/peoples/' . $path . '?p='))
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
                        <a class="page-link @if($currPage == 1) disabled @endif" href="{{ $paginationUrl . $prevPage }}"
                            aria-label="Previous">
                            <span aria-hidden="true">Previous</span>
                        </a>
                    </li>

                    @php($min = max(1, $currPage - 2))
                    @php($max = $min == 1 ? 5 : min($lastPage, $currPage + 2))
                    @php($min = ($max - $min != 5) ? $max - 4 : $min)

                    @for ($i = $min; $i <= $max; $i++) <li class="page-item {{ $i == $currPage ? 'active' : '' }}">
                        <a class="page-link" href="{{ $paginationUrl . $i }}" data-original="{{ $i }}">{{ $i }}</a>
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

    <script type="text/javascript">
        $(document).ready(function() {
            getPeopleRecords(1);
        });
        
        $('#more-page-btn').click(function (e) {
            if ($(this).prop('disabled')) {
                e.preventDefault();
                return;
            }
            
            $(this).prop('disabled', true);
            
            let pageNext = $(this).attr('data-next-page');

            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin-right: 5px;"></span><span class="sr-only">loading...</span>');

            getPeopleRecords(pageNext);
            
            e.preventDefault();
        });
        
        function getPeopleRecords(pageNext) {
            let pageNavId = '#page-nav';
            let moreBtnId = '#more-page-btn';
            let pageUrl = "{{ url('/api/peoples') }}";
            
            $.ajax({
                type: 'GET',
                url: pageUrl,
                data: {
                    p: pageNext,
                },
                async: true,
                contentType: 'application/json',
                success: (response) => {
                    $.each(response.data.records, function (index, rec) {
                        $(getPeopleCard(rec)).hide()
                            .appendTo('.peoples-list .container>.row.p-2')
                            .fadeIn(2000);
                    });
                    
                    $(moreBtnId).prop('disabled', false)
                        .attr('data-current-page', response.data.page)
                        .attr('data-next-page', response.data.next)
                        .html('more');
                    $(pageNavId).removeClass('d-none');
                },
                error: function (response) {
                    $(moreBtnId).prop('disabled', false);
                }
            });
        }

        function getPeopleCard(rec) {
            var profileName = rec.name;
            var profileImg = rec.profile_path;
            var profileUrl = rec.profile_url;
            var rslt = '<div class="card d-flex flex-wrap align-items-left">';
            rslt += '<div class="card-img">';
            rslt += '<a href="' + profileUrl + '">';
            rslt += '<img data-original="' + profileImg + '" class="card-img-top lazyload" alt="' + profileName + '" src="' + profileImg + '">';
            rslt += '</a></div> <div class="card-body"><h5 class="card-title">';
            rslt += '<a href="' + profileUrl + '">' + profileName + '</a>';
            rslt += '</h5><p class="card-text">' + rec.profile_known_for + '</p></div></div>';

            return rslt;
        }
    </script>
</body>

</html>