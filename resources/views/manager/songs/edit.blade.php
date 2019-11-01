@extends('layouts.app')
@section('title', 'Chỉnh sửa bai hat')

@section('content')
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $("#list_singer").tokenInput("{{asset('api/singers?q=singer')}}", {--}}
    {{--                hintText: 'Nhập tên ca sỹ',--}}
    {{--                noResultsText: "Không tìm thấy ca sỹ ",--}}
    {{--                searchingText: 'Đang tìm kiếm...',--}}
    {{--                theme: 'facebook',--}}
    {{--                preventDuplicates: true,--}}
    {{--                prePopulate: '',--}}
    {{--            })--}}
    {{--        });--}}
    {{--        $(document).ready(function () {--}}
    {{--            $("#list_artist").tokenInput("{{asset('api/artists?q=artist')}}", {--}}
    {{--                hintText: 'Nhập tên ca sỹ',--}}
    {{--                noResultsText: "Không tìm thấy ca sỹ ",--}}
    {{--                searchingText: 'Đang tìm kiếm...',--}}
    {{--                theme: 'facebook',--}}
    {{--                preventDuplicates: true,--}}
    {{--                prePopulate: '',--}}
    {{--            })--}}
    {{--        });--}}

    {{--    </script>--}}

    <div class="container">
            <form method="post" action="{{route('songs.update', $song->id)}}" enctype="multipart/form-data">
                @csrf
                <div>
                    <h3>CHỈNH SỬA THÔNG TIN BÀI HÁT</h3>
                </div>
                <div>
                    <div class="form-group">
                        <label>Bài hát</label>
                        <input type="text" class="form-control" name="name"
                               value="{{ $song->name }}"
                               placeholder="Tên bài hát">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">File</label>
                        <input type="text" class="form-control-file" name="song_file" value="{{ $song->file_name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Ảnh bài hát</label><br>
                        @if($song->image == '')
                            <img id="blaha" height="150" width="150"
                                 src="https://playercdn.listenlive.co/templates/StandardPlayerV4/webroot/img/default-cover-art.png"/>
                        @else
                            <img id="blaha" height="150" width="150"
                                 src="{{asset('/storage/public/upload/images/'.$song->image) }}"/>
                        @endif
                        <br>
                        <input id="imgInp" type="file" class="form-control-file" name="image_file"
                               aria-describedby="fileHelp"
                               onchange="document.getElementById('blaha').src = window.URL.createObjectURL(this.files[0])"
                               class="form-control-file"

                        >
                    </div>
                    <div class="form-group">
                        <label>Ca sĩ</label>
                        <input type="text" id="list_singer" class="form-control" name="singer_ids"
                               placeholder="Tên ca sĩ"
                               value="@foreach($song->singers as $singer){{$singer->name.", "}}@endforeach">
                    </div>
                    <div class="form-group">
                        <label>Nhạc sĩ</label>
                        <input type="text" id="list_artist" class="form-control" name="artist_ids" placeholder="Nhạc sĩ"
                               value="@foreach($song->artists as $artist){{$artist->name.", "}}@endforeach">
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select name="category_id" class="custom-select">
                            @foreach($categories as $groupName => $group)
                                <optgroup label="{{ $groupName }}">
                                    @foreach($group as $key => $category)
                                        <option
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lời bài hát</label>
                        <textarea class="form-control" name="lyric" rows="4">{{$song->lyric}}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    <div class="modal fade" id="addArtist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới nhạc sỹ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('artists.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        Tên nhạc sỹ:
                        <input type="text" class="form-control" name="name">
                        Ngày sinh:
                        <input type="date" class="form-control" name="dob">
                        Tiểu sử:
                        <textarea name="story" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addSinger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới ca sỹ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('singers.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        Tên ca sỹ:
                        <input type="text" class="form-control" name="name">
                        Ngày sinh:
                        <input type="date" class="form-control" name="dob">
                        Tiểu sử:
                        <textarea name="story" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
