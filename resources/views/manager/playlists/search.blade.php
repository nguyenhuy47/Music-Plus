@extends('layouts.app')
@section('content')
<div>
    <h4>Tìm kiếm</h4>
    <div>
        <p>Tìm thấy {{ count($playlists) }} Playlist</p>
    </div>
</div>
<div>
    @foreach($playlists as $playlist)
    <div class="caption">
        <h5><a href="{{route('playlists.show', $playlist->id)}}" style="color: black;"><strong
                    style="color: red;">{{$STT++ . '. '}}</strong>{{$playlist->name}}</a></h5>
    </div>
    @endforeach

</div>
@endsection
