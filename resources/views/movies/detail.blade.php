<!doctype html>
<html lang="en">

    <head>
        @include('layouts.head')
        <link href="{{ asset('css/movie_detail.css') }}" rel="stylesheet">
    </head>

    <body>
        @include('layouts.header')

        <main class="movies-detail">
            <div class="header">
                <div class="container">
                    <div class="custom_bg">
                        <div class="card">
                            <div class="card-img">
                                <!-- <h1>{{ $detail['title'] }}</h1> -->
                                <img src="{{ $cfg['url_img_detail'] . $detail['poster_path'] }}"
                                    class="poster card-img-top lazyload rounded" alt="{{ $detail['original_title'] }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- <style type="text/css?">
            main.movies-detail {
                background-image: url(https://media.themoviedb.org/t/p/w1920_and_h800_multi_faces/is9bmV6uYXu7LjZGJczxrjJDlv8.jpg);
            }
        </style> -->

        @include('layouts.footer')
        @include('layouts.script')
    </body>

</html>