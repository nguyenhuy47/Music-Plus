@extends ('layouts.app')
@section('content')
    <div style="width: 30%; margin-left: 35%;: ">
        <table border="1" class="table table-bordered text-center">
            <thead class="thead-light">
            <tr>
                <th colspan="2" style="text-align: center"><b>{{strtoupper($singer->name) }}</b></th>
            </tr>
            </thead>
            <tr style="text-align: left">
                <td COLSPAN="2"><b>THÔNG TIN</b></td>
            </tr>

            <tbody>
            <tr>
                <td>Ngày sinh</td>
                <td>{{$singer->dob}}</td>

            </tr>
            <tr>
                <td>Tiểu sử</td>
                <td>{{$singer->story}}</td>
            </tr>
            <tr style="text-align: left">
                <td COLSPAN="2"><b>DANH SÁCH BÀI HÁT</b></td>
            </tr>
            <tr>
                <td>STT</td>
                <td>TÊN BÀI HÁT</td>
            </tr>
            @foreach($singer->songs as $key => $song)
                <tr>
                    <td>{{$key+1}}</td>
                    <td style="text-align: left"><a href="{{route('songs.play', $song->id)}}">{{$song->name}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
