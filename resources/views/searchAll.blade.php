@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div>
                    <h4 style="color: cyan">Tìm thấy {{ count($playlists) }} Playlist</h4>
                </div>
                <div>
                    @foreach($playlists as $playlist)
                        <div class="caption">
                            <h5><a href="{{route('playlists.show', $playlist->id)}}" style="color: black;"><strong
                                        style="color: red;">{{$STT++ . '. '}}</strong>{{$playlist->name}}</a></h5>
                        </div>
                    @endforeach
                </div>
                <hr>
            </div>

            <div>
                <h4 style="color: green">Tìm thấy {{ count($singers) }} ca sĩ</h4>
            </div>
            <div>
                @foreach($singers as $singer)
                    <div class="caption">
                        <h5><a href="{{route('singers.show', $singer->id)}}" style="color: black;"><strong
                                    style="color: red;">{{$STT1++ . '. '}}</strong>{{$singer->name}}</a></h5>
                    </div>
                @endforeach
            </div>
            <hr>
            <div>
                <h4 style="color: blue">Tìm thấy {{ count($songs) }} bài hát</h4>
            </div>
            <div>
                @foreach($songs as $song)
                    <div class="caption">
                        <h5><a href="{{route('songs.play', $song->id)}}" style="color: black;"><strong
                                    style="color: red;">{{$STT2++ . '. '}}</strong>{{$song->name}}</a></h5>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
