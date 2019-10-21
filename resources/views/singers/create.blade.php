@extends ('layouts.app')
@section('content')
    <form method="post" action="{{route('singers.store')}}">
        @csrf
        <div class="form-group">
            <label>Tên ca sĩ</label>
            <input type="text" class="form-control" name="name" placeholder="Tên ca sĩ">
        </div>

        <div class="form-group">
            <label>Sinh nhật</label>
            <input type="date" class="form-control" name="dob">
        </div>
        <div class="form-group">
            <label>Tiểu sử</label>
            <textarea name="story" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit">Thêm</button>
    </form>
@endsection
