@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>

            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Rất tiếc!</strong> Có một số vấn đề với đầu vào của bạn.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-4">
                <div class="profile-header-container">
                    <div class="col-4 profile-header-img">
                        <img id="image" height="200" width="200" class="rounded-circle"
                             src=" @if(!$user->avatar){{asset('/storage/avatars/default-ava.jpg') }} @else {{asset('/storage/avatars/'.$user->avatar) }} @endif"/>
                        <!-- badge -->
                        <div class="rank-label-container">
                        </div>
                    </div>
                </div>
            </div>

            <form action="/profile" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">TÊN NGƯỜI DÙNG</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                               placeholder="TÊN NGƯỜI DÙNG" value="{{$user->name}}" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">NGÀY SINH</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" value="{{$user->dob}}"
                               name="dob">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">GIỚI TÍNH</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="gender">
                            <option>{{$user->gender}}</option>
                        @if($user->gender == 'NAM')
                                <option>NỮ</option>
                            @endif
                            @if($user->gender == 'NỮ')
                                <option>NAM</option>
                            @endif
                            @if($user->gender != 'NAM' && $user->gender != 'NỮ')
                                <option>NỮ</option>
                                <option>NAM</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">ẢNH ĐẠI DIỆN</label>
                        <input type="file" class="form-control-file" name="avatar" id="avatarFile"
                               aria-describedby="fileHelp"
                               onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                        >
                        <small id="fileHelp" class="form-text text-muted">Vui lòng tải lên một tập tin hình ảnh hợp lệ.
                            Kích thước của hình ảnh không được quá 2MB.</small>
                        <button type="submit" class="btn btn-primary">Cập nhập</button>
                        <a href="{{ route('password.request') }} ">Thay đổi mật khẩu</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
