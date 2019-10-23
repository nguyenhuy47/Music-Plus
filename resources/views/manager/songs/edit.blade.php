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

    <div class="col-12 col-md-12">
        <div class="row" style="margin: auto">
            <div class="col-12">
                <h1>Chỉnh sửa thông tin bai hat</h1>
            </div>

            <form method="post" action="{{route('songs.update', $song->id)}}" enctype="multipart/form-data">
                @csrf
                <div>
                    <div class="form-group">
                        <label>Bài hát</label>
                        <input type="text" class="form-control" name="name"
                               value="{{ $song->name }}"
                               placeholder="Tên bài hát">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">File</label>
                        <input type="text" class="form-control-file" name="song_file" value="{{ $song->file_name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Ảnh bài hát</label><br>
                        <img id="blaha" src="{{asset('storage/upload/images/'.$song->image)}}" alt=""
                             style="width: 100px">
                        <br>
                        <input id="imgInp" type="file" class="form-control-file" name="image_file" value="{{$song->image}}">
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
                        <textarea class="form-control" name="lyric" rows="5">{{$song->lyric}}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>

@endsection
