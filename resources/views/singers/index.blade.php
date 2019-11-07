@extends ('layouts.masterSideBar')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    @if(Auth::check())
                    @endif
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th style="text-align: center"><a class="btn btn-info float-right" href="{{route('singers.create')}}">THÊM CA SĨ</a>DANH SÁCH CA SĨ</th>
                        </tr>
                        </thead>
                    </table>
                    @foreach($singers as $key => $singer)
                        <div class="col-3 text-center">
                                <a href="{{route('singers.show', $singer->id)}}">
                                    <img class="d-block w-100 pull-left p-4 " height="150" width="150" src="{{asset('/storage/singer_image/'.$singer->image)}}">
                                    <span class="btn btn-light border-info text-info" style="color: white">{{$singer->name}}</span>
                                </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
