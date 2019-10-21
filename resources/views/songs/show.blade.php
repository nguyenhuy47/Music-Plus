<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Music Plus</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/css3-mediaqueries.js"></script>
    <script type="text/javascript" href="js/Search.js"></script>
    <link rel="stylesheet" href="css/style_menu.css" type="text/css">
    <link rel="stylesheet" href="css/slider.css">
    <script src="https://kit.fontawesome.com/1cd0cba936.js" crossorigin="anonymous"></script>
</head>
<body data-vide-bg="video/snow">
@include(' layouts.top-nav')
<div class="container pt-5">
    <div class="row">
        <div class="col-md-9">
            <div class="player">
                <audio controls autoplay>
                    <source src="{{asset('/storage/upload/songs/'.$song->file_name)}}" type="audio/mpeg">
                </audio>
            </div>
            <div class="social-plugin"></div>
        </div>
        <div class="col-md-3" id="bxh" style="margin-top: 2px;">
            <div class="thumbnail" style="border-color: blue;">
                <a href="#"><h3 style="text-align: center;color: blue;">BÀI HÁT MỚI NHẤT</h3></a>
                <hr>
                @foreach($songs as $key => $baihat)
                    <div class="caption">
                        <h5><a href="{{route('songs.play', $baihat->id)}}" style="color: black;"><strong style="color: red;">{{$STT++ . '. '}}</strong>{{$baihat->name}}</a></h5>
                    </div>
                @endforeach
                {{--                <div class="caption">--}}
                {{--                    <h5><a href="" target="_blank" style="color: black;"><strong style="color: green;">02.</strong> Em--}}
                {{--                            ơi</a></h5>--}}
                {{--                </div>--}}
                {{--                <div class="caption">--}}
                {{--                    <h5><a href="" target="_blank" style="color: black;"><strong style="color: yellow;">03.</strong> Nơi--}}
                {{--                            này có anh</a></h5>--}}
                {{--                </div>--}}
                {{--                <div class="caption">--}}
                {{--                    <h5><a href="" target="_blank" style="color: black;">04. Lá vàng rơi gió</a></h5>--}}
                {{--                </div>--}}
                {{--                <div class="caption">--}}
                {{--                    <h5><a href="" target="_blank" style="color: black;">05. Ta là cho nhau</a></h5>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
    @yield('content')
    <div class="row">
        <div class="col-md-9">
            <div class="lyric" id="_divLyricHtml">
                <div class="pd_name_lyric">
                    <h2 class="name_lyric"><b>Lời bài hát: {{$song->name}}</b></h2>
                    <p class="name_post">
                        Nhạc sĩ: {{ $song->artist->name}}
                    </p>
                    <p class="name_post">Lời đăng bởi: {{ $song->user->name }}</p>
                </div>
                <hr>
                <p id="divLyric" class="pd_lyric trans" style="height:auto;max-height:none;">
                    {!! nl2br($song->lyric) !!}
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="thumbnail" style="margin-top: 20px;border-color: green;">
                <h3 align="center"><a href="">CHỦ ĐỀ HOT</a></h3>
                <hr>
                <div class="row" style="margin-bottom: 7px;">
                    <a href="">
                        <img src="{{asset('img/cd1.jpg')}}" alt="" width="90%;">
                    </a>
                </div>
                <div class="row" style="margin-bottom: 7px;">
                    <a href="">
                        <img src="{{asset('img/cd2.jpg')}}" alt="" width="90%">
                    </a>
                </div>
                <div class="row" style="margin-bottom: 7px;">
                    <a href="">
                        <img src="{{asset('img/cd3.jpg')}}" alt="" width="90%">
                    </a>
                </div>
                <div class="row" style="margin-bottom: 7px;">
                    <a href="">
                        <img src="{{asset('img/cd4.jpg')}}" alt="" width="90%">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <hr>
            <a href="#"><h3 style="color: blue;"> MV HOT</h3></a>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="{{asset('img/mv1.jpg')}}" alt="mv1">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="{{asset('img/mv2.jpg')}}" alt="mv2">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="{{asset('img/mv3.jpg')}}" alt="mv3">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="{{asset('img/mv4.jpg')}}" alt="mv4">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="{{asset('img/mv5.jpg')}}" alt="mv5">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="{{asset('img/mv6.jpg')}}" alt="mv6">
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
                    <h5><a href="https://www.24h.com.vn/" target="_blank" style="color: black;"><strong style="color: red;">Tin tức
                                24h</strong> </a></h5>
                </div>
                <div class="caption">
                    <h5><a href="http://vnexpress.net" target="_blank" style="color: black;"><strong style="color: green;">Tin nhanh
                                VnExpress</strong> </a></h5>
                </div>
                <div class="caption">
                    <h5><a href="https://dantri.com.vn" target="_blank" style="color: black;"><strong style="color: #FFCC33;">Báo dân
                                trí</strong> </a></h5>
                </div>
                <div class="caption">
                    <h5><a href="https://vietnamnet.vn/" target="_blank" style="color: black;"><strong style="color: #66CC00;">Báo
                                VietNamNet</strong> </a></h5>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
<div id="player">
    <audio controls autoplay hidden>
        <source src="{{URL::asset('uploads/music.mp3')}}" type="audio/mpeg">
        unsupported !!
    </audio>
</div>
@include('layouts.footer')
<script src="/js/app.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://vodkabears.github.io/vide/js/jquery.vide.min.js"></script>
</body>

</html>


