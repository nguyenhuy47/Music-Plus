@extends('pages.index')
@section('content')
    <div  class="container pt-5">
        <div class="row">
            <div class="col-md-9">
                <a  class="btn btn-group bg-primary" href="{{route('artists.create')}}">THÊM NHẠC SĨ</a>

                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th colspan="3" style="text-align: center">DANH SÁCH NHẠC SĨ</th>
                    </tr>
                    <tr>
                        <td>STT</td>
                        <td>Nhạc sĩ</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($artists as $key => $artist)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><a href="{{route('artists.show', $artist->id)}}">{{$artist->name}}</a>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
