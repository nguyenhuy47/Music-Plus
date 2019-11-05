@extends ('../index')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-9">
                <div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewPlaylist">
                        THÊM MỚI PLAYLIST
                    </button>
                    <table class="table">
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
                                <td style="text-align: left"><a
                                        href="{{ route('playlists.show', $playlist->id) }}">{{strtoupper($playlist->name)}}</a>
                                </td>
                                <td><span title="sửa" style="cursor: pointer" data-toggle="modal" data-target="#updatePlaylist{{$playlist->id}}"><i
                                            class="fas fa-edit"></i></span>&emsp;
                                    <a title="xóa" href="{{ route('playlist.destroyAll', $playlist->id) }}"
                                       onclick="return confirm('ban chac chan xoa?')"><i
                                            class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <!-- Modal Update Playlist-->
                            <div class="modal fade" id="updatePlaylist{{$playlist->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT PLAYLIST</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('playlists.update', $playlist->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                Tên Playlist:
                                                <input type="text" class="form-control" name="name"
                                                       value="{{$playlist->name}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Hủy
                                                </button>
                                                <button type="submit" class="btn btn-primary">Thêm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>


                </div>

                <!-- Modal Create Playlist-->
                <div class="modal fade" id="addNewPlaylist" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">THÊM MỚI PLAYLIST</h5>
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
