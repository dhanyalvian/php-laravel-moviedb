<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
    <link href="{{ asset('css/movie_detail.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')

    <main id="movies-detail" style="margin: 0;">
        <div class="header">
            <div class="custom_bg">
                <h1>{{ $detail['title'] }}</h1>
                <img src="{{ $cfg['url_img_detail'] . $detail['poster_path'] }}" class="poster card-img-top lazyload rounded"
                    alt="{{ $detail['original_title'] }}">
            </div>
        </div>
    </main>

    <style type="text/css?">
        main#movies-detail>.header>.custom_bg {
            background-image: url(https://media.themoviedb.org/t/p/w1920_and_h800_multi_faces/is9bmV6uYXu7LjZGJczxrjJDlv8.jpg);
        }
    </style>

    @include('layouts.footer')
    @include('layouts.script')
</body>

</html>