@extends('layouts.masterSideBar')
@section('content')
<div>
    <h4>Tìm kiếm</h4>
    <div>
        <p>Tìm thấy {{ count($playlists) }} Playlist</p>
    </div>
</div>
<div>
    @foreach($playlists as $playlist)
        @php
            $PlaylistName = $playlist['name']=str_replace($keyword,"<span class='bg-warning'>$keyword</span>",$playlist['name']);
        @endphp
    <div class="caption">
        <h5><a href="{{route('guest.playlists.show', $playlist['id'])}}" style="color: black;"><strong
                    style="color: red;">{{$STT++ . '. '}}</strong>{!! $PlaylistName !!}</a></h5>
    </div>
    @endforeach
</div>
@endsection
