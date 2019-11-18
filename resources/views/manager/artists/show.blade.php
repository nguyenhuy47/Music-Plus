@extends('layouts.master')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th colspan="3" style="text-align: center"><b>{{strtoupper($artist->name) }}</b></th>
                    </thead>
                    <td colspan="3"><b>THÔNG TIN</b>
                        <a class="btn btn-primary float-right" href="{{route('artists.edit', $artist->id)}}">CHỈNH SỬA</a>
                    </td>
                    </tr>
                    <tbody>
                    <tr>
                        <td>Ngày sinh</td>
                        <td colspan="3">{{$artist->dob}}</td>
                    </tr>
                    <tr>
                        <td>Tiểu sử</td>
                        <td>{{$artist->story}}</td>
                    </tr>

                    <tr style="text-align: left">
                        <td colspan="3"><b>DANH SÁCH BÀI HÁT</b></td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>TÊN BÀI HÁT</td>
                        <td>TÊN CA SĨ</td>
                    </tr>
                    @foreach($artist->songs as $key => $song)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><a href="{{route('songs.play', $song->id)}}">{{$song->name}}</a></td>
                            <td>
                                @foreach($song->singers as $singer)
                                    <a href="">{{$singer->name}}</a>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
