@extends('layouts.app')
@section('content')
    <div class="text-center col-md-9">
        @error('songIds')
        <div style="width: 50%; margin-left: 25%" class="alert alert-danger">{{ $message }}</div>
        @enderror
        <table border="1" class="table table-bordered text-center" style="width: 50%; margin-left: 25%; ">
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
                @if(Auth::user())
                    <td>CHỈNH SỬA</td>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($playlist->songs as $song)
                <tr>
                    <td>{{$STT++}}</td>
                    <td style="text-align: left"><a href="{{route('songs.play', $song->id)}}"
                                                    style="color: black;">{{$song->name}}</a></td>
                    <td> @foreach($song->singers as $singer)  {{$singer->name.""}}<br>@endforeach</td>
                    <td> @foreach($song->artists as $artist)  {{$artist->name.""}}<br>@endforeach<  /td>
                    @if(Auth::user())
                        <td>
                            <a href="{{ route('playlists.destroy', ['playlistId' => $playlist->id, 'songId' => $song->id]) }}"
                               onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                    class="fas fa-trash-alt"></i></a></td>
                    @endif
                </tr>
            @endforeach
            @if(Auth::user())
            <tr>
                <td colspan="5">
                    <span id="show-form" style="cursor: pointer">Thêm bài hát</span>
                </td>
            </tr>
            @endif
            </tbody>
        </table>
        <div id="form" style="margin-left: 25%; display: none">
            <form action="{{route('playlists.addSong', $playlist->id)}}" method="post">
                @csrf
                <input type="text" name="songIds" id="list_song">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>


@endsection
@section('script')
    <script>
        $(document).ready(function () {
           $('#show-form').click(function () {
               $('#form').show();
           })
        });
    </script>
@endsection
