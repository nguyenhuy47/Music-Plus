@extends('layouts.app')
@section('content')
    <div>
        <h4>Tìm kiếm</h4>
        <div>
            <p>Tìm thấy {{ count($songs) }} bài hát</p>
        </div>
    </div>
    <div>
        @foreach($songs as $song)
            <div class="caption">
                <h5><a href="{{route('songs.play', $song->id)}}" style="color: black;"><strong
                            style="color: red;">{{$STT++ . '. '}}</strong>{{$song->name}}</a></h5>
            </div>
        @endforeach

    </div>

@endsection
