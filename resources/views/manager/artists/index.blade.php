@extends('pages.index')
@section('content')
    <div  class="container pt-5">
        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nhạc sĩ</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($artists as $key => $artist)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td><a href="{{route('artists.show', $artist->id)}}">{{$artist->name}}</a>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{route('artists.create')}}">Create</a>

            </div>
            @include('pages.newsong')
        </div>
        <div class="row">
            @include('pages.album')
            @include('pages.topic')
        </div>
        <div class="row">
            @include('pages.mv')
            @include('pages.media')
        </div>
    </div>
@endsection
