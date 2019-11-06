@extends ('layouts.master')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('singers.update', $singer->id)}}">
        @csrf
        <div class="form-group">
            <label>Tên ca sĩ</label>
            <input type="text" class="form-control" name="name" value="{{$singer->name}}">
        </div>

        <div class="form-group">
            <label>Sinh nhật</label>
            <input type="date" class="form-control" name="dob" value="{{$singer->dob}}">
        </div>
        <div class="form-group">
            <label>Tiểu sử</label>
            <textarea name="story" class="form-control" rows="3">{{$singer->story}}</textarea>
        </div>
        <button type="submit">Thêm</button>
    </form>
@endsection
