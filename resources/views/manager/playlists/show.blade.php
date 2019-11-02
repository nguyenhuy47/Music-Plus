@extends('pages.index')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-9">
                <table border="1" class="table table-bordered text-center" style="width: 30%; margin-left: 35%;: ">
                    <thead class="thead-light">
                    <tr>
                        <th colspan="3" style="text-align: center">{{strtoupper($playlist->name)}}</th>
                        <th colspan="2" style="text-align: center"><a
                                href="{{ route('playlists.playAll', $playlist->id) }}">{{'Nghe tất cả  '}}<i
                                    class="fas fa-play-circle"></i></a></th>
                    </tr>
                    <tr>
                        <td>STT</td>
                        <td>TÊN BÀI HÁT</td>
                        <td>TÊN CA SĨ</td>
                        <td>TÊN NHẠC SĨ</td>
                        <td>CHỈNH SỬA</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($playlist->songs as $song)
                        <tr>
                            <td>{{$STT++}}</td>
                            <td style="text-align: left"><a href="{{route('songs.play', $song->id)}}"
                                                            style="color: black;">{{$song->name}}</a></td>
                            <td> @foreach($song->singers as $singer)  {{$singer->name.""}}<br>@endforeach</td>
                            <td> @foreach($song->artists as $artist)  {{$artist->name.""}}<br>@endforeach</td>
                            <td>
                                <a href="{{ route('playlists.destroy', ['playlistId' => $playlist->id, 'songId' => $song->id]) }}"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
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
