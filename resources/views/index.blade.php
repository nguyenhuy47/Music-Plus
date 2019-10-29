<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Music Plus</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('js/css3-mediaqueries.js')}}"></script>
    <script type="text/javascript" href="js/Search.js"></script>
    <link rel="stylesheet" href="{{asset('css/style_menu.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
    <script src="https://kit.fontawesome.com/1cd0cba936.js" crossorigin="anonymous"></script>
</head>
<body data-vide-bg="video/snow">
@include(' layouts.top-nav')
<div class="container pt-5 bg-light">
    <div class="row">
        <div class="col-md-9">
            <div class="example">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="img/pic1.jpg" alt="city">
                        </div>
                        <div class="item">
                            <img src="img/pic2.jpg" alt="city2">
                        </div>
                        <div class="item">
                            <img src="img/pic3.jpg" alt="city3">
                        </div>
                        <div class="item">
                            <img src="img/pic4.jpg" alt="city4">
                        </div>
                        <div class="item">
                            <img src="img/pic5.jpg" alt="city5">
                        </div>
                        ...
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div> <!-- /SLIDE -->
        </div>
        @include('manager.songs.list-new-songs')
    </div>
    @yield('content')
    @include('manager.playlists.hot-playlist')
    <div class="row">
        <div class="col-md-9">
            <hr>
            <a href="#"><h3 style="color: blue;"> MV HOT</h3></a>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/mv1.jpg" alt="mv1">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/mv2.jpg" alt="mv2">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/mv3.jpg" alt="mv3">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/mv4.jpg" alt="mv4">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/mv5.jpg" alt="mv5">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/mv6.jpg" alt="mv6">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3" style="margin-top: 20px;">
            <div class="thumbnail" style="border-color: #001100;">
                <a href="#"><h3 style="text-align: center;color: blue;">BÁO ĐIỆN TỬ</h3></a>
                <hr>
                <div class="caption">
                    <h5><a href="https://www.24h.com.vn/" target="_blank" style="color: black;"><strong
                                style="color: red;">Tin tức
                                24h</strong> </a></h5>
                </div>
                <div class="caption">
                    <h5><a href="http://vnexpress.net" target="_blank" style="color: black;"><strong
                                style="color: green;">Tin nhanh
                                VnExpress</strong> </a></h5>
                </div>
                <div class="caption">
                    <h5><a href="https://dantri.com.vn" target="_blank" style="color: black;"><strong
                                style="color: #FFCC33;">Báo dân
                                trí</strong> </a></h5>
                </div>
                <div class="caption">
                    <h5><a href="https://vietnamnet.vn/" target="_blank" style="color: black;"><strong
                                style="color: #66CC00;">Báo
                                VietNamNet</strong> </a></h5>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
{{--<div id="player">--}}
{{--    <audio controls autoplay hidden>--}}
{{--        <source src="{{URL::asset('uploads/music.mp3')}}" type="audio/mpeg">--}}
{{--        unsupported !!--}}
{{--    </audio>--}}
{{--</div>--}}
@include('layouts.footer')

<script src="{{asset('/js/jquery-ui/app.js')}}"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://vodkabears.github.io/vide/js/jquery.vide.min.js"></script>
</body>
</html>
