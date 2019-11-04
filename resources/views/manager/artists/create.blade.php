@extends ('layouts.app')
@section('content')
    <div class="container">
    <form method="post" action="{{route('artists.store')}}">
        @csrf
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th style="text-align: center">THÊM MỚI NHẠC SĨ</th>
            </tr>
        </table>
        <div class="form-group">
            <label>Tên nhạc sĩ</label>
            <input type="text" class="form-control" name="name" placeholder="Tên nhạc sĩ">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}
        </div>
        @enderror
        <div class="form-group">
            <label>Sinh nhật</label>
            <input type="date" class="form-control" name="dob">
        </div>
        @error('dob')
        <div class="alert alert-danger">{{ $message }}
        </div>
        @enderror
        <div class="form-group">
            <label>Tiểu sử</label>
            <textarea name="story" class="form-control" rows="3"></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Thêm</button>
    </form>
    </div>
@endsection
