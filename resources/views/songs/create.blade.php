{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}

@extends('layouts.app')
@section('content')

    <div class="container pt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('success'))
            <p class="text-success">{{Session::get('success')}}</p>
        @endif
        @if (Session::has('createdSingerSuccess'))
            <p class="text-success">{{Session::get('createdSingerSuccess')}}</p>
        @endif
        @if (Session::has('createdArtistSuccess'))
            <p class="text-success">{{Session::get('createdArtistSuccess')}}</p>
        @endif
        @if (Session::has('errorImageFile'))
            <p class="text-danger">{{Session::get('errorImageFile')}}</p>
        @endif
        @if (Session::has('errorSongFile'))
            <p class="text-danger">{{Session::get('errorSongFile')}}</p>
        @endif
        @if (Session::has('error'))
            <p class="text-danger">{{Session::get('error')}}</p>
        @endif
        @if (Session::has('errorSongInfo'))
            <p class="alert alert-danger">{{Session::get('errorSongInfo')}}</p>
        @endif
        @if (Session::has('errorDob'))
            <p class="text-danger">{{Session::get('errorDob')}}</p>
        @endif
        <form method="post" action="{{route('songs.store')}}" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-group">
                    <label>Bài hát</label>
                    <input type="text" class="form-control" name="name" placeholder="Tên bài hát">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload bài hát</label>
                    <input type="file" class="form-control-file" name="song_file">
                </div>
                <div class="form-group">
                    <label>Ảnh bài hát</label>
                    <input type="file" class="form-control-file" name="image_file">
                </div>
                <div class="form-group">
                    <label>Ca sĩ</label>
                    <input type="text" class="form-control" id="list_singer" name="singer_ids">
                </div>
                <div class="form-group">
                    <label>Nhạc sĩ</label>
                    <input type="text" class="form-control" id="list_artist" name="artist_ids">
                </div>
                <div class="form-group">
                    <label>Thể loại</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $groupName => $group)
                            <optgroup label="{{ $groupName }}">
                                @foreach($group as $key => $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Lời bài hát</label>
                    <textarea class="form-control" name="lyric" rows="3"></textarea>
                </div>
            </div>
            <button type="submit">Tải lên</button>
        </form>
    </div>

    <!-- Modal -->
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
