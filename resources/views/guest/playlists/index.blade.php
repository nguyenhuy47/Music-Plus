@extends('pages.index')
@section('content')
    <div  class="container pt-5">
        <div class="row">
                <div class="col-md-9">
                    <div>
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th colspan="3" style="text-align: center">DANH SÁCH PLAYLIST</th>
                            </tr>
                            <tr>
                                <td>STT</td>
                                <td>TÊN PLAYLIST</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($playlists as $key => $playlist)
                                <tr class="p-2">
                                    <td>{{$key++}}</td>
                                    <td style="text-align: left"><a href="{{ route('guest.playlists.show', $playlist->id) }}">{{strtoupper($playlist->name)}}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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

