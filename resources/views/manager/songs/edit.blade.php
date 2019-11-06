@extends('layouts.master')
@section('title', 'Chỉnh sửa bai hat')

@section('content')
    @if(Session::has('notification'))
        <p style="text-align: center;" class="alert alert-success">
            {{Session::get('notification')}}
        </p>
    @endif
    <div class="col-12 col-md-12" style="margin-left: 35%">
        <div class="row" style="margin: auto">
            <form method="post" action="{{route('songs.update', $song->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="col-12" style="padding-top: 10px">
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
                        <label>Ảnh bài hát</label><br>
                        <img id="image-song" src="{{asset('storage/public/upload/images/'.$song->image)}}" alt=""
                             style="width: 80px">
                        <br>
                        <input
                            onchange="document.getElementById('blaha').src = window.URL.createObjectURL(this.files[0])"
                            id="imgInp" type="file" class="form-control-file" name="image_file"
                               value="{{$song->image}}">

                        <input id="imgInp" type="file" class="form-control-file" name="image_file"
                               value="{{$song->image}}" onchange="document.getElementById('image-song').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="form-group">
                        <label>Ca sĩ</label>
                        <input type="text" id="list_singer" class="form-control" name="singer_ids"
                               placeholder="Tên ca sĩ"
                               value="">
                    </div>
                    <div class="form-group">
                        <label>Nhạc sĩ</label>
                        <input type="text" id="list_artist" class="form-control" name="artist_ids" placeholder="Nhạc sĩ"
                               value="">
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
                <button type="submit" class="btn btn-primary">Lưu</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
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
