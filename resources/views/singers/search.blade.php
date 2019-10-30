@extends('layouts.app')
@section('content')
    <div>
        <h4>Tìm kiếm</h4>
        <div>
            <p>Tìm thấy {{ count($singers) }} ca sĩ</p>
        </div>
    </div>
    <div>
        @foreach($singers as $singer)
            <div class="caption">
                <h5><a href="{{route('singers.show', $singer->id)}}" style="color: black;"><strong
                            style="color: red;">{{$STT++ . '. '}}</strong>{{$singer->name}}</a></h5>
            </div>
        @endforeach

    </div>

@endsection
