@extends('layouts.master')
@section('style')
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{asset('css/player.css')}}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection
@section('content')
    @include('includes.facebookSDK')
    <div class="container pt-5">
        <div class="col-md-9">
            @if(!$song->path)
                <div class="col-md-12">
                    <p class="alert alert-primary">Bài hát đang được xử lý...</p>
                </div>
            @else
                <div class="col-md-12">
                    <audio class="audio" preload="none"></audio>
                    <div class="player paused">
                        <div id="project-container">
                            <div id="overlay"></div>
                            <div id="content">
                                <h2 class="title">Throne</h2>
                                <h3>Bring Me The Horizon</h3>
                                <div class="time">
                                    <span class="current-time">0:00</span>/
                                    <span class="duration">0:00</span>
                                </div>
                                <div class="process">
                                    <input class="process-bar" type="range" step="0.1" min="0">
                                </div>
                                <div id="controls">
                                    <div class="button loop-btn"><i class="fa fa-refresh" aria-hidden="true"></i></div>
                                    <div class="button prev-btn"><i class="fa fa-step-backward" aria-hidden="true"></i>
                                    </div>
                                    <div class="button"><i class="fa fa-play play-btn fa-fw" aria-hidden="true"></i>
                                    </div>
                                    <div class="button next-btn"><i class="fa fa-step-forward" aria-hidden="true"></i>
                                    </div>
                                    <div class="button random-btn"><i class="fa fa-random" aria-hidden="true"></i></div>
                                    <div class="button"><i class="fa fa-volume-up mute-btn" aria-hidden="true"></i>
                                    </div>
                                    <div class="button"><input class="volume-bar" type="range" step="0.1" min="0"
                                                               max="1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="plwrap">
                        <ul id="plList"></ul>
                    </div>
                </div>
            @endif
            <div class="social-plugin col-md-12">
                <div>
                    <!-- Button trigger modal -->
                    @if(Auth::user())
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#addPlaylistModal">
                            Add Playlist
                        </button>
                @endif @include('includes.like', ['like_item' => 'song-'.$song->id])

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
                                        <input type="text" id="song_id" name="song_id" hidden value="{{ $song->id }}">
                                        <br>
                                        <br> Playlist:
                                        <select id="playlist_id" name="playlist_id">
                                            @foreach($user->playlists as $playlist)
                                                <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Trở về
                                        </button>
                                        <button type="button" id="btn-add-to-playlist" class="btn btn-primary">Thêm
                                        </button>
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
                                                           name="email" value="{{ old('email') }}" required
                                                           autocomplete="email" autofocus> @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           name="password" required
                                                           autocomplete="current-password"> @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                               id="remember" {{ old( 'remember') ? 'checked' : '' }}>

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
                                                       href="{{ route('facebook.login', 'facebook') }}">Đăng
                                                        nhập bằng Facebook</a> @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a> @endif
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
            <div class="lyric col-md-12" id="_divLyricHtml">
                <div class="pd_name_lyric">
                    <h2 class="name_lyric"><b>Lời bài hát: {{ $song->name }}</b></h2>
                    <p class="name_post">
                        Nhạc sĩ: @foreach($song->artists as $artist) {{$artist->name}}@endforeach
                    </p>
                    <p class="name_post">Lời đăng bởi: {{ $song->user->name }}</p>

                    <div class="lyric-detail">
                        {!! nl2br($song->lyric) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12 comment-facebook">
                @include('includes.commentfb', ['commentItem'=> 'song-'.$song->id])
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var tracks = [<?php echo $song ?>];
        console.log(tracks)
    </script>
    <script src="{{ asset('js/player.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
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
@endsection