@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div>
                    <h4 style="color: cyan">Tìm thấy {{ count($playlists) }} Playlist</h4>
                </div>
                <div>
                    @foreach($playlists as $playlist)
                        @php
                            $PlaylistName = $playlist['name']=str_replace($keyword,"<span class='bg-warning'>$keyword</span>",$playlist['name']);
                        @endphp
                        <div class="caption">
                            <h5><a href="{{route('playlists.show', $playlist['id'])}}" style="color: black;"><strong
                                        style="color: red;">{{$STT++ . '. '}}</strong>{!! $PlaylistName !!}</a></h5>
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
                    @php
                        $singerName = $singer['name']=str_replace($keyword,"<span class='bg-warning'>$keyword</span>",$singer['name']);
                    @endphp
                    <div class="caption">
                        <h5><a href="{{route('singers.show', $singer['id'])}}" style="color: black;"><strong
                                    style="color: red;">{{$STT++ . '. '}}</strong>{!! $singerName !!}</a></h5>
                    </div>
                @endforeach
            </div>
            <hr>
            <div>
                <h4 style="color: blue">Tìm thấy {{ count($songs) }} bài hát</h4>
            </div>
            <div>
                @foreach ($songs as $song)
                    @php
                        $songName = $song['name']=str_replace($keyword,"<span class='bg-warning'>$keyword</span>",$song['name']);
                    @endphp
                    <div class="caption">
                        <h5><a href="{{route('songs.play', $song['id'])}}" style="color: black;"><strong
                                    style="color: red;">{{$STT++ . '. '}}</strong>{!! $songName !!}</a></h5>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
