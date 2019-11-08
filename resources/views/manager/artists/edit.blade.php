@extends ('layouts.master')
@section('content')
    @if(Session::has('notification'))
        <p style="text-align: center;" class="alert alert-success">
            {{Session::get('notification')}}
        </p>
    @endif
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('artists.update', $artist->id)}}">
            @csrf
            <div class="form-group">
                <label>Tên nhạc sĩ</label>
                <input type="text" class="form-control" name="name" value="{{$artist->name}}">
            </div>
            <div class="form-group">
                <label>Ngày sinh</label>
                <input type="date" class="form-control" name="dob" value="{{$artist->dob}}">
            </div>
            <div class="form-group">
                <label>Tiểu sử</label>
                <textarea name="story" class="form-control" rows="3">{{$artist->story}}</textarea>
            </div>
            <button class="btn btn-primary" type="submit">Lưu</button>
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
        </form>
    </div>
@endsection
