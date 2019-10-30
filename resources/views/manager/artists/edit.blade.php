@extends ('layouts.app')
@section('content')
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
            <label>Sinh nhật</label>
            <input type="date" class="form-control" name="dob" value="{{$artist->dob}}">
        </div>
        <div class="form-group">
            <label>Tiểu sử</label>
            <textarea name="story" class="form-control" rows="3">{{$artist->story}}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Thêm</button>
    </form>
    </div>
@endsection
