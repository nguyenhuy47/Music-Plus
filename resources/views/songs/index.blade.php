@extends('layouts.masterSideBar')
@section('content')
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th colspan="7" style="text-align: center">DANH SÁCH BÀI HÁT</th>
        </tr>
        </thead>
    </table>
    <table class="table">
        <tbody>
        @foreach($songs as $song)
            <tr>
                <td><a href="{{route('songs.play', $song->id)}}"><img height="50" width="50"
                                                                      src="{{asset('/storage/public/upload/images/'.$song->image)}}"></a>
                </td>
                <td style="text-align: left"><a href="{{route('songs.play', $song->id)}}"
                                                style="color: black;">{{$song->name}}</a></td>
                <td> @foreach($song->singers as $singer)  {{$singer->name.""}}<br>@endforeach</td>
                <td> @foreach($song->artists as $artist)  {{$artist->name.""}}<br>@endforeach</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
