@extends ('layouts.master')
@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif
            @if (Session::has('errorDob'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ Session::get('errorDob') }}</strong>
                </div>
            @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('singers.store')}}" enctype="multipart/form-data">
            @csrf
            <div>
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th colspan="3" style="text-align: center">THÊM MỚI CA SĨ</th>
                    </tr>
                    </thead>
                </table>
                <div class="form-group">
                    <label>Tên ca sĩ</label>
                    <input type="text" class="form-control" name="name" placeholder="Tên ca sĩ">
                </div>
                <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" class="form-control" name="dob">
                </div>
                <div class="form-group">
                    <label>Ảnh ca sĩ</label>
                    <input type="file" class="form-control-file" id="" name="image">
                </div>
                <div class="form-group">
                    <label>Tiểu sử</label>
                    <textarea name="story" class="form-control" rows="6"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">LƯU</button>
            </div>
        </form>
    </div>
@endsection
