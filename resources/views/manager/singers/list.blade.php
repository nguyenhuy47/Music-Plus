@extends ('layouts.masterSideBar')
@section('content')
{{--    <div>--}}
{{--        <table class="table">--}}
{{--            <thead class="thead-light">--}}
{{--            <tr>--}}
{{--                <th colspan="2" style="text-align: center">DANH SÁCH CA SĨ--}}
{{--                    @if(Auth::check())--}}
{{--                        <a class="btn btn-info float-right" href="{{route('singers.create')}}">THÊM CA SĨ</a>--}}
{{--                    @endif--}}
{{--                </th>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>STT</td>--}}
{{--                <td>TÊN CA SĨ</td>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($singers as $key => $singer)--}}
{{--                <tr>--}}
{{--                    <td>{{$key+1}}</td>--}}
{{--                    <td><a href="{{route('singers.show', $singer->id)}}">{{strtoupper($singer->name)}}</a>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--
{{--    </div>--}}
<div class="row">


    <table class="table">
        <thead class="thead-light">
        <tr>
            <th style="text-align: center">@if(Auth::check())<a class="btn btn-info float-right" href="{{route('singers.create')}}">THÊM CA SĨ</a>@endif DANH SÁCH CA SĨ</th>
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
{{$singers->links()}}
@endsection
