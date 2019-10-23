{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Playlist</title>--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}

{{--</head>--}}
{{--<body>--}}

@extends('layouts.app')
@section('content')
    <div style="width: 30%; margin-left: 35%;: ">
        <table border="1" class="table table-bordered text-center">
            <thead class="thead-light">
            <tr>
                <th colspan="3" style="text-align: center">DANH SÁCH PLAYLIST</th>
            </tr>
            <tr>
                <td>STT</td>
                <td>TÊN PLAYLIST</td>
                <td>CHỈNH SỬA</td>
            </tr>
            </thead>
            <tbody>
            @foreach($playlists as $key => $playlist)
                <tr class="p-2">
                    <td>{{$STT++}}</td>
                    <td style="text-align: left"><a href="{{ route('playlists.show', $playlist->id) }}">{{strtoupper($playlist->name)}}</a></td>
                    <td><a href="{{ route('playlist.destroyAll', $playlist->id) }}"
                           onclick="return confirm('ban chac chan xoa?')">Xoa</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewPlaylist">
            Thêm mới Playlist
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addNewPlaylist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Playlist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('playlists.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        Tên Playlist:
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>--}}
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}
    {{--</body>--}}
    {{--</html>--}}
@endsection
