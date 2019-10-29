@extends ('../index')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-9">
                <div>
                    <a class="btn btn-group bg-primary" href="{{route('singers.create')}}">THÊM CA SĨ</a>
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th colspan="2" style="text-align: center">DANH SÁCH CA SĨ</th>
                        </tr>
                        <tr>
                            <td>STT</td>
                            <td>TÊN CA SĨ</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($singers as $key => $singer)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><a href="{{route('singers.show', $singer->id)}}">{{$singer->name}}</a>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('pages.newsong')
        </div>
        <div class="row">
            @include('pages.album')
            @include('pages.topic')
        </div>
        <div class="row">
            @include('pages.mv')
            @include('pages.media')
        </div>
    </div>
@endsection
