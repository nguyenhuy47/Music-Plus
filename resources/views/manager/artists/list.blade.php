@extends('layouts.master')
@section('content')
    <div  class="container pt-5">
        <div class="row">
            <div class="col-md-9">


                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th colspan="3" style="text-align: center"> <a class="btn btn-info float-right" href="{{route('artists.create')}}">THÊM NHẠC SĨ</a>DANH SÁCH NHẠC SĨ</th>
                    </tr>
                    <tr>
                        <td>STT</td>
                        <td>TÊN NHẠC SĨ</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($artists as $key => $artist)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><a href="{{route('artists.show', $artist->id)}}">{{$artist->name}}</a>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $artists->links() }}

            </div>
        </div>
    </div>
@endsection
