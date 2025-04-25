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
                    {{ $title }} Peoples
                </h2>

                <div class="row p-2">
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
                </div>

                <nav aria-label="page-navigation">
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
                </nav>
            </div>
        </main>

        @include('layouts.footer')
        @include('layouts.script')
    </body>

</html>