@extends('layouts.master')
@section('content')
    <div>
        <h4>Tìm kiếm</h4>
        <div>
            <p>Tìm thấy {{ count($singers) }} ca sĩ</p>
        </div>
    </div>
    <div>
        @foreach($singers as $singer)
            @php
                $singerName = $singer['name']=str_replace($keyword,"<span class='bg-warning'>$keyword</span>",$singer['name']);
            @endphp
            <div class="caption">
                <h5><a href="{{route('singers.show', $singer['id'])}}" style="color: black;"><strong
                            style="color: red;">{{$STT++ . '. '}}</strong>{!! $singerName !!}</a></h5>
            </div>
        @endforeach
    </div>
@endsection
