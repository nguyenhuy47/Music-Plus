@extends ('layouts.master')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-9">
                <div>
                    @if(Auth::check())

                    @endif
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th colspan="3git" style="text-align: center"> <a class="btn btn-info float-right" href="{{route('singers.create')}}">THÊM CA SĨ</a>DANH SÁCH CA SĨ</th>
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
                                <td><a href="{{route('singers.show', $singer->id)}}">{{strtoupper($singer->name)}}</a>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
