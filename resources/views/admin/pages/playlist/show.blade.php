@extends('layouts.masterSideBar')
@section('content')
    <table border="1" class="table table-bordered text-center" style="width: 100%; ">
        <thead class="thead-light">
        <tr>
            <th colspan="3" style="text-align: center">{{strtoupper($playlist->name)}}</th>
            <th colspan="2" style="text-align: center"><a
                    href="{{ route('playlists.playAll', $playlist->id) }}">{{'Nghe tất cả  '}}<i
                        class="fa fa-play-circle"></i></a></th>
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
                <td style="text-align: left"><a href="{{route('songs.play', $song->id)}}"
                                                style="color: black;">{{$song->name}}</a></td>
                <td> @foreach($song->singers as $singer)  {{$singer->name.""}}<br>@endforeach</td>
                <td> @foreach($song->artists as $artist)  {{$artist->name.""}}<br>@endforeach</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

