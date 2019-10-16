@extends('layouts.app')

@section('content')

<div class="container">
    <div class="player">
        <audio controls autoplay>
            <source src="{{asset('/storage/upload/songs/'.$song->file_name)}}" type="audio/mpeg">
        </audio>
    </div>
    <div class="social-plugin">

    </div>
    <div class="lyric" id="_divLyricHtml">
        <div class="pd_name_lyric">
            <h2 class="name_lyric"><b>Lời bài hát: {{ $song->name }}</b></h2>
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


@endsection
