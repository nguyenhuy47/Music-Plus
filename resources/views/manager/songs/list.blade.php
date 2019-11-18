@extends('layouts.masterSideBar')
@section('content')
    <table class="table">
        <thead class="bg-light">
        <tr class="text-center">
            <th colspan="5"><b>DANH SÁCH BÀI HÁT</b>
                @if (Auth::guest())
                @else
                    <a class="btn btn-primary float-right" href="{{ route('songs.create') }}">Tải lên</a>
                @endif
            </th>
        </tr>
        </thead>
        <tr class="text-center">
            <th>Ảnh</th>
            <th>Tên bài hát</th>
            <th>Tên ca sĩ</th>
            <th>Tên nhạc sĩ</th>
            <th>Chỉnh sửa</th>
        </tr>
        <tbody>
        @foreach($songs as $song)
            <tr>
                <td><img height="50" width="50" src="{{asset('/storage/public/upload/images/'.$song->image)}}"></td>
                <td style="text-align: left"><a href="{{route('songs.play', $song->id)}}"
                                                style="color: black;">{{$song->name}}</a></td>
                <td> @foreach($song->singers as $singer)  {{$singer->name.""}}<br>@endforeach</td>
                <td> @foreach($song->artists as $artist)  {{$artist->name.""}}<br>@endforeach</td>
                <td>
                    <a type="button" class="btn btn-primary" href="{{ route('songs.edit', $song->id) }}"
                       title="Sửa"><span class="fa fa-edit"></span></a>
                    <a type="button" class="btn btn-danger" title="Xóa" href="{{route('songs.destroy', $song->id)}}"
                       onclick="return confirm('Bạn có chắc chắn muốn xóa')"><span class="fa fa-trash"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
