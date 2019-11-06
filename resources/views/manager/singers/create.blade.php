@extends ('layouts.master')
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
        <form method="post" action="{{route('singers.store')}}">
            @csrf
            <div>
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th colspan="2" style="text-align: center">THÊM MỚI CA SĨ</th>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <td><label>Tên ca sĩ</label></td>
                            <td><input type="text" class="form-control" name="name" placeholder="Tên ca sĩ"></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <td><label>Sinh nhật</label></td>
                            <td><input type="date" class="form-control" name="dob"></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <td><label>Tiểu sử</label></td>
                            <td><textarea name="story" class="form-control" rows="6"></textarea></td>
                        </div>
                    </tr>
                </table>
                <button CLASS="btn btn-primary" type="submit">LƯU</button>
            </div>
        </form>
    </div>
@endsection
