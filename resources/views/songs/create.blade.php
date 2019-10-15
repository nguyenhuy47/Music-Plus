@extends('layouts.app')
@section('content')
    <div class="container">
        @if (Session::has('success'))
            <p class="text-success">{{Session::get('success')}}</p>
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
                    <input type="text" class="form-control" name="singer_id" placeholder="Tên ca sĩ">
                </div>
                <div class="form-group">
                    <label>Nhạc sĩ</label>
                    <input type="text" class="form-control" name="artist_id" placeholder="Nhạc sĩ">
                </div>
                <div class="form-group">
                    <label>Thể loại</label>
                    <select name="category_id" class="custom-select">
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
            <button type="submit">Upload</button>
        </form>
    </div>
@endsection
