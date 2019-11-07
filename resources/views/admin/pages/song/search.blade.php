@extends('layouts.master')
@section('content')
    <div>
        <h4>Tìm kiếm</h4>
        <div>
            <p>Tìm thấy {{ count($songs) }} bài hát</p>
        </div>
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
@endsection

