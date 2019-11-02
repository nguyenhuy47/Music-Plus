@extends('pages.index')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th colspan="3" style="text-align: center">{{strtoupper($playlist->name)}}</th>
                        <th colspan="2" style="text-align: center"><a
                                href="{{ route('guest.playlists.playAll', $playlist->id) }}">{{'Nghe tất cả  '}}<i
                                    class="fas fa-play-circle"></i></a></th>
                    </tr>
                    <tr>
                        <td>STT</td>
                        <td>TÊN BÀI HÁT</td>
                        <td>TÊN CA SĨ</td>
                        <td>TÊN NHẠC SĨ</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($playlist->songs as $song)
                        <tr>
                            <td>{{$STT++}}</td>
                            <td><a href="{{route('songs.play', $song->id)}}"
                                                            style="color: black;">{{$song->name}}</a></td>
                            <td>
                                <a href="" style="color: black">
                                    @foreach($song->singers as $singer)
                                        {{$singer->name.""}}

                                    @endforeach
                                </a>
                            </td>
                            <td>
                                <a href="" style="color: black">
                                    @foreach($song->artists as $artist)
                                        {{$artist->name.""}}

                                    @endforeach
                                </a>
                            </td>
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
