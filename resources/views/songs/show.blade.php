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
    {{--<<<<<<< HEAD--}}
    {{--=======--}}
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/css3-mediaqueries.js"></script>
    <script type="text/javascript" href="js/Search.js"></script>
    {{-->>>>>>> c103bf27818df678aaf0e67a8db001adfca0003a--}}
    <link rel="stylesheet" href="css/style_menu.css" type="text/css">
    <link rel="stylesheet" href="css/slider.css">
    <script src="https://kit.fontawesome.com/1cd0cba936.js" crossorigin="anonymous"></script>

    <script src="{{asset('js/mediaelementJs/build/mediaelement-and-player.min.js')}}"></script>
    <link href="{{asset('js/mediaelementJs/build/mediaelementplayer.css')}}" rel="stylesheet">
</head>
<body data-vide-bg="video/snow">
@include(' includes.facebookSDK')
@include(' layouts.top-nav')
<div class="container pt-5">
    @if(!$song->path)
        <div class="row">
            <div class="col-md-9">
                <p class="alert alert-primary"> Bài hát đang được xử lý...</p>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-9">
                <div class="thumb">
                    <div class="row">
                        <div class="col-5">
                            <img class="dia-cd" src="https://drive.google.com/uc?id=14_VgXAjKeCQ5MLsBsMA2hqJfr-DTObXd"
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
                <div class="social-plugin"></div>
            </div>
            <div class="col-md-3" id="bxh" style="margin-top: 2px;">
                <div class="thumbnail" style="border-color: blue;">
                    <a href="#"><h3 style="text-align: center;color: blue;">BÀI HÁT MỚI NHẤT</h3></a>
                    <hr>
                    @foreach($songs as $key => $baihat)
                        <div class="caption">
                            <h5><a href="{{route('songs.play', $baihat->id)}}" style="color: black;"><strong
                                        style="color: red;">{{$STT++ . '. '}}</strong>{{$baihat->name}}</a></h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="social-plugin">
        <div>
            <!-- Button trigger modal -->
            @if(Auth::user())
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPlaylistModal">
                    Add Playlist
                </button>
        @endif
        @include('includes.like', ['like_item' => 'song-'.$song->id])

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
                            <div class="modal-body">
                                Bài hát: {{ $song->name }}
                                <input type="text" id="song_id" name="song_id" hidden value="{{ $song->id }}"><br><br>
                                Playlist:
                                <select id="playlist_id" name="playlist_id">
                                    @foreach($user->playlists as $playlist)
                                        <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Trở về</button>
                                <button type="button" id="btn-add-to-playlist" class="btn btn-primary">Thêm</button>
                            </div>
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
                                                   name="email" value="{{ old('email') }}" required autocomplete="email"
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
                                            <a class="btn btn-primary" href="{{ route('facebook.login', 'facebook') }}">Đăng
                                                nhập bằng Facebook</a>

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
    <div class="lyric" id="_divLyricHtml">
        <div class="pd_name_lyric">
            <h2 class="name_lyric"><b>Lời bài hát: {{ $song->name }}</b></h2>
            <p class="name_post">
                Nhạc sĩ:
                @foreach($song->artists as $artist) {{$artist->name}}@endforeach
            </p>
            <p class="name_post">Lời đăng bởi: {{ $song->user->name }}</p>

            <div class="col-md-9">
                <textarea name="" id="" cols="100" rows="10" disabled>{!! nl2br($song->lyric) !!}</textarea>
            </div>
            <div class="col-md-9">
                @include('includes.commentfb', ['commentItem'=> 'song-'.$song->id])
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="http://vodkabears.github.io/vide/js/jquery.vide.min.js"></script>
<script src="{{asset('js/app.js')}}"></script>

<script type="text/javascript" src="{{asset('js/css3-mediaqueries.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Search.js')}}"></script>
<script src="{{asset('js/mediaelementJs/build/mediaelement-and-player.min.js')}}"></script>
<script>
    var player = new MediaElementPlayer('player');
</script>
{{--<<<<<<< HEAD--}}
{{--=======--}}
<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script>
    $(document).ready(function () {
        $('#btn-add-to-playlist').click(function () {
            $.ajax({
                type: "post",
                url: "{{route('ajax.songs.addToPlaylist')}}",
                data: {
                    songId: $("#song_id").val(),
                    playlistId: $("#playlist_id").val(),
                },
                success: function (response) {
                    $('#addPlaylistModal').modal('hide');
                    $('.modal-backdrop').remove();
                    toastr.success(response);
                    $("#song_id").val();
                    $("#playlist_id").val();
                },
                error: function () {
                    $('#addPlaylistModal').modal('hide');
                    $('.modal-backdrop').remove();
                    toastr.error("Tạo mới không thành công");
                }
            })
        });
    });
</script>
{{-->>>>>>> c103bf27818df678aaf0e67a8db001adfca0003a--}}
</body>
</html>


