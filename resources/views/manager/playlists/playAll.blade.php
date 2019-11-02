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
    <link href="{{asset('js/mediaelementJs/build/mediaelementplayer.min.css')}}" rel="stylesheet">
    <link href="{{asset('js/mediaelement-plugins/dist/playlist/playlist.css')}}" rel="stylesheet">
    <style>
        .song-info {
            color: #21f8f8;
            text-align: center;
            position: center;
        }

        .thumb {
            width: 100%;
            height: 360px;
            background-color: #3e3e3e;
            background-image: none;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;

        }

        img {
            display: block;
            max-width: 100%
        }

        .dia-cd {
            width: 400px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
            animation: xoayvong 20s linear 0s infinite;
            -webkit-animation: xoayvong 20s linear 0s infinite;
            -moz-animation: xoayvong 20s linear 0s infinite;
            -o-animation: xoayvong 20s linear 0s infinite;
        }

        /*Chrome, Safari, Opera*/
        @-webkit-keyframes xoayvong {
            from {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -o-transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -o-transform: rotate(360deg);
            }
        }

        /* Standard syntax */
        @keyframes xoayvong {
            from {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -o-transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -o-transform: rotate(360deg);
            }
        }
    </style>
</head>
<body data-vide-bg="video/snow">
@include(' layouts.top-nav')
<div class="container pt-5">
    <div class="row">
        <div class="col-md-9">
            <div class="media-wrapper col-md-12">
                <audio id="player" preload controls autoplay width="750">
                    @foreach($playlist->songs as $song)
                        <source src="https://drive.google.com/uc?id={{ $song->path }}" type="audio/mp3"
                                title="{{ $song->name }}"
                                data-playlist-thumbnail="{{asset('storage/public/upload/images/'.$song->image)}}" data-playlist-description="{{$song->category->name}}">
                    @endforeach
                </audio>
            </div>
        </div>
        @include('pages.newsong')
    </div>
    <div class="row">
        @if($playlist->comment_list_id)
            <div class="comment col-md-9">
                <div class="create-comment">
                    <form action="{{route('comments.store', $playlist->comment_list_id)}}" method="post">
                        @csrf
                        <textarea name="content" cols="30" rows="3" class="form-control"></textarea>
                        <button class="btn btn-primary" type="submit">Bình luận</button>
                    </form>
                </div>
                <hr>
                <div class="show-comment col-md-12">
                    @foreach($comments as $comment)
                        <div class="row">
                            <div class="col-md-3"><b>avatar</b></div>
                            <div class="col-md-9">
                                <div class="col-md-12"><b>{{$comment->user->name}}</b>{{' - ' . $comment->created_at}}</div>
                                <div class="col-md-12">{{$comment->content}}</div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        @endif
        @include('pages.topic')
    </div>
    <div class="row">
        @include('pages.mv')
        @include('pages.media')
    </div>
</div>
<script src="{{asset('js/mediaelementJs/build/mediaelement-and-player.js')}}"></script>
<script src="{{asset('js/mediaelement-plugins/dist/playlist/playlist.js')}}"></script>
<script>
    var player = new MediaElementPlayer('player', {
        features: ['prevtrack', 'playpause', 'nexttrack', 'current', 'progress', 'duration', 'volume', 'playlist', 'shuffle', 'loop', 'fullscreen'],
    });
</script>
<script src="/js/app.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://vodkabears.github.io/vide/js/jquery.vide.min.js"></script>
@include('layouts.footer')
</body>

</html>



