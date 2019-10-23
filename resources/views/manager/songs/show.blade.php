@extends('layouts.app')
@section('content')
        <table border="1" class="table table-bordered text-center" style="width: 40%; margin-left: 30%;: ">
            <thead class="thead-light">
            <tr>
                <th colspan="5" style="text-align: center">DANH SÁCH BÀI HÁT</th>
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
            @foreach($songs as $song)
                <tr>
                    <td>{{++$STT}}</td>
                    <td style="text-align: left"><a href="{{route('songs.play', $song->id)}}" style="color: black;">{{$song->name}}</a></td>
                    <td> @foreach($song->singers as $singer)  {{$singer->name.""}}<br>@endforeach</td>
                    <td> @foreach($song->artists as $artist)  {{$artist->name.""}}<br>@endforeach</td>
                    <td><a href="{{ route('songs.edit', $song->id) }}">sửa</a>
                        <a href="{{route('songs.destroy', $song->id)}}"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa')">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
