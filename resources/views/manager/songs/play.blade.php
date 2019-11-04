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
    <script src="{{asset('js/mediaelementJs/build/mediaelement-and-player.min.js')}}"></script>
    <link href="{{asset('js/mediaelementJs/build/mediaelementplayer.css')}}" rel="stylesheet">
    <style>
        .song-info {
            color: #21f8f8;
            text-align: center;
            position: center;
        }

        .player-control {
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        .thumb {
            width: 100%;
            height: 360px;
            background-color: #3e3e3e;
            background-image: none;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            position: relative;

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
@include('layouts.top-nav')
<div class="container pt-5">
    <div class="container pt-5">
        <div class="row">
            @if(!$song->path)
                <div class="col-md-9">
                    <p class="alert alert-primary"> Bài hát đang được xử lý...</p>
                </div>
                @include('pages.newsong')
            @else
                <div class="col-md-9">
                    <div class="thumb">
                        <div class="row">
                            <div class="col-5">
                                <img class="dia-cd"
                                     src="https://drive.google.com/uc?id=14_VgXAjKeCQ5MLsBsMA2hqJfr-DTObXd"
                                     alt="">
                            </div>
                            <div class="col-7 song-info">
                                <h2>
                                    <div>{{$song->name}}</div>
                                </h2>
                                <div>Ca sĩ: @foreach($song->singers as $singer) {{$singer->name}}@endforeach</div>
                                <div>Nhạc sĩ: @foreach($song->artists as $artist) {{$artist->name}}@endforeach</div>
                            </div>
                        </div>
                        <div class="player-control">
                            <audio controls autoplay loop id="player" class="mejs__container" style="width: 100%">
                                <source src="https://docs.google.com/uc?id={{ $song->path }}" type="audio/mpeg">
                            </audio>
                        </div>
                    </div>
                    @include('pages.newsong')
                </div>
            @endif
            <div class="social-plugin">
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPlaylistModal">
                        Add Playlist
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addPlaylistModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                @if($user)
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Chọn Playlist</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('songs.addToPlaylist') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            Bài hát: {{ $song->name }}
                                            <input type="text" name="song_id" hidden value="{{ $song->id }}"><br><br>
                                            Playlist:
                                            <select name="playlist_id">
                                                @foreach($user->playlists as $playlist)
                                                    <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Trở
                                                về
                                            </button>
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                        </div>
                                    </form>
                                @else
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="email"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email') }}" required
                                                           autocomplete="email"
                                                           autofocus>

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           name="password" required autocomplete="current-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Login') }}
                                                    </button>
                                                    <br>
                                                    <br>
                                                    <a class="btn btn-primary"
                                                       href="{{ route('facebook.login', 'facebook') }}">
                                                        Đăng nhập bằng Facebook
                                                    </a>

                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="lyric" id="_divLyricHtml">
                    <div class="pd_name_lyric">
                        <h2 class="name_lyric">
                            <b>
                                Lời bài hát: {{ $song->name }}
                            </b>
                        </h2>
                        Nhạc sĩ:
                        @foreach($song->artists as $artist)
                            <a href="{{route('guest.artists.play',$artist->id)}}">
                                {{$artist->name}}
                                @endforeach
                            </a>
                            ca sĩ:
                            @foreach($song->singers as $singer)
                                <a href="{{route('guest.singers.play',$singer->id)}}">
                                    {{$singer->name}}
                                </a>
                            @endforeach

                            <p class="name_post">
                                Lời đăng bởi: {{$song->user->name }}
                            </p>

                            <div class="col-md-9">
                                <textarea name="" id="" cols="100" rows="10"
                                          disabled>{!! nl2br($song->lyric) !!}</textarea>
                            </div>
                            @if($song->comment_list_id)
                                <div class="comment col-md-9">
                                    <div class="create-comment">
                                        <form action="{{route('comments.store', $song->comment_list_id)}}"
                                              method="post">
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
                                                    <div class="col-md-12">
                                                        <b>{{$comment->user->name}}</b>{{' - ' . $comment->created_at}}
                                                    </div>
                                                    <div class="col-md-12">{{$comment->content}}</div>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                    </div>
                </div>

            </div>
            @include('pages.topic')
        </div>
        <div class="row">
            @include('pages.mv')
            @include('pages.media')
        </div>
    </div>
</div>
<script>
    var player = new MediaElementPlayer('player');
</script>
<script src="/js/app.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://vodkabears.github.io/vide/js/jquery.vide.min.js"></script>
</body>

</html>


