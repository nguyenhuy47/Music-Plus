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
                    <strong>Rất tiếc!</strong>Có một số vấn đề với đầu vào của bạn.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row justify-content-center">

            <div class="profile-header-container">
                <div class="profile-header-img">
                    <img id="image" height="150" width="150" class="rounded-circle" src="{{asset('/storage/avatars/'.$user->avatar) }}" />
                    <!-- badge -->
                    <div class="rank-label-container">
                    </div>
                </div>
            </div>


            <form action="/profile" method="post" enctype="multipart/form-data">
                @csrf
                <span class="label label-default rank-label">{{$user->name}}</span>
                <div class="form-group">
                    <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp"
                           onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                           class="form-control-file">

                    <small id="fileHelp" class="form-text text-muted">Vui lòng tải lên một tập tin hình ảnh hợp lệ. Kích thước của hình ảnh không được quá 2MB.</small>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhập</button>
            </form>
        </div>
    </div>
@endsection
