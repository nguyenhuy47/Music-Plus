@extends('pages.index')
@section('content')
    <div  class="container pt-5">
        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th colspan="7" style="text-align: center">DANH SÁCH BÀI HÁT</th>
                    </tr>
                    </thead>
                </table>
                <table class="table">
                    <tbody>
                    @foreach($baihat as $song)
                        <tr>
                            <td><a href="{{route('songs.play', $song->id)}}"><img height="50" width="50" src="{{asset('/storage/public/upload/images/'.$song->image)}}"></a></td>
                            <td style="text-align: left"><a href="{{route('songs.play', $song->id)}}" style="color: black;">{{$song->name}}</a></td>
                            <td> @foreach($song->singers as $singer)  {{$singer->name.""}}<br>@endforeach</td>
                            <td> @foreach($song->artists as $artist)  {{$artist->name.""}}<br>@endforeach</td>
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
{{--<<<<<<< HEAD--}}
        <div class="col-md-3" id="bxh" style="margin-top: 2px;">
            <div class="thumbnail" style="border-color: blue;">
                <a href="#"><h3 style="text-align: center;color: blue;">BÀI HÁT MỚI NHẤT</h3></a>
                <hr>
                @foreach($songs as $key => $song)
                    <div class="caption">
                        <h5><a href="{{route('songs.play', $song->id)}}" style="color: black;"><strong
                                    style="color: red;">{{$STT++ . '. '}}</strong>{{$song->name}}</a></h5>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <hr style="border-color: white;">
            <a href="#"><h3 style="color: blue;"> ALBUM HOT</h3></a>
            <hr style="border-color: white;">
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/al1.jpg" alt="album1">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/al2.jpg" alt="album2">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/al3.jpg" alt="album3">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="thumbnail" style="margin-top: 20px;border-color: green;">
                <h3 align="center"><a href="">CHỦ ĐỀ HOT</a></h3>
                <hr>
                <div class="row" style="margin-bottom: 7px;">
                    <a href="">
                        <img src="img/cd1.jpg" alt="" width="90%;">
                    </a>
                </div>
                <div class="row" style="margin-bottom: 7px;">
                    <a href="">
                        <img src="img/cd2.jpg" alt="" width="90%">
                    </a>
                </div>
                <div class="row" style="margin-bottom: 7px;">
                    <a href="">
                        <img src="img/cd3.jpg" alt="" width="90%">
                    </a>
                </div>
                <div class="row" style="margin-bottom: 7px;">
                    <a href="">
                        <img src="img/cd4.jpg" alt="" width="90%">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <hr>
            <a href="#"><h3 style="color: blue;"> PLAYLIST MỚI NHẤT</h3></a>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/mv1.jpg" alt="mv1">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/mv2.jpg" alt="mv2">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/mv3.jpg" alt="mv3">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/mv4.jpg" alt="mv4">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/mv5.jpg" alt="mv5">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="">
                            <img src="img/mv6.jpg" alt="mv6">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3" style="margin-top: 20px;">
            <div class="thumbnail" style="border-color: #001100;">
                <a href="#"><h3 style="text-align: center;color: blue;">BÁO ĐIỆN TỬ</h3></a>
                <hr>
                <div class="caption">
                    <h5><a href="https://www.24h.com.vn/" target="_blank" style="color: black;"><strong
                                style="color: red;">Tin tức
                                24h</strong> </a></h5>
                </div>
                <div class="caption">
                    <h5><a href="http://vnexpress.net" target="_blank" style="color: black;"><strong
                                style="color: green;">Tin nhanh
                                VnExpress</strong> </a></h5>
                </div>
                <div class="caption">
                    <h5><a href="https://dantri.com.vn" target="_blank" style="color: black;"><strong
                                style="color: #FFCC33;">Báo dân
                                trí</strong> </a></h5>
                </div>
                <div class="caption">
                    <h5><a href="https://vietnamnet.vn/" target="_blank" style="color: black;"><strong
                                style="color: #66CC00;">Báo
                                VietNamNet</strong> </a></h5>
                </div>
            </div>
            <hr>
{{--=======--}}
        <div class="row">
            @include('pages.mv')
            @include('pages.media')
{{-->>>>>>> c103bf27818df678aaf0e67a8db001adfca0003a--}}
        </div>
    </div>
@endsection
