@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<title>Upload</title>
</head>
<body >
	<div class="container">
		@if(Session::has('insert_task_message'))
		<div>
			{{Session::get('insert_task_message')}}
		</div>
		@endif
		@if(Session::has('success'))
			<div class="alert-box success">
				<h3>{!! Session::get('success') !!}</h3>
			</div>
		@endif
		@if(Session::has('successs'))
			<div class="alert-box success">
				<h3>{!! Session::get('successs') !!}</h3>
			</div>
		@endif
		@if(Session::has('no'))
			<div class="alert-box success">
				<h3>{!! Session::get('no') !!}</h3>
			</div>
		@endif
		@if(Session::has('delete_task_message'))
			<div class="alert-box success">
				<h3>{{Session::get('delete_task_message')}}</h3>
			</div>
		@endif
		<div class="row">
			<div class="col-md-4">
				<div class="thumbnail" style="border: ridge;">
				<hr>
						{!! Form::open(['route'=>'musics.store','method'=>'POST','files'=>true]) !!}
						{!! Form::file('images[]',array('multiple'=>true)) !!}
						<p>{!! $errors->first('images') !!}</p>
						@if(Session::has('error'))
							<p>{!! Session::get('error') !!}</p>
						@endif
						<div class="row">
							<div class="col-md-3">
								{!! Form::label('artist','Sáng tác') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('artist') !!} <br />
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								{!! Form::label('singer','Ca sĩ') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('singer') !!} <br />
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								{!! Form::label('type','Thể loại') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('type') !!} <br />
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								{!! Form::label('year','Năm') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('year') !!} <br />
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								{!! Form::label('country','Quốc gia') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('country') !!} <br />
							</div>
						</div>
						<hr>
						<div class="container">
							<div class="row">
								<div class="col-md-4">
									{!! Form::submit('Insert',array('class'=>'btn btn-lg btn-primary col-md-10')) !!}
								</div>
							</div>
						</div>
						{!! Form::close() !!}
				</div>
			</div>
			<div class="col-md-8">
				<table class="table table-bordered" style="border: ridge">
					<thead>
						<tr>
							<td colspan="11" style="text-align: center;color: blue;font-weight: bold;background-color: #CAFF70;">THÔNG TIN BÀI HÁT </td>
						</tr>
						<tr>
							<th style="text-align: center;">Tên bài hát</th>
							<th style="text-align: center;">Định dạng</th>
							<th style="text-align: center;">Original Filename</th>
							<th style="text-align: center;">Nhạc sĩ</th>
							<th style="text-align: center;">Ca sĩ</th>
							<th style="text-align: center;">Thể loại</th>
							<th style="text-align: center;">Năm</th>
							<th style="text-align: center;">Quốc gia</th>
							<th style="text-align: center;">Edit</th>
							<th style="text-align: center;">Delete</th>
							<th style="text-align: center;color: #00BFFF;"> <img src="{{ URL::asset('img/g1.gif') }}" alt="" width="20" height="20"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($v_music as $_music =>$music_value)
							<tr>
								<td><a href="{{ URL ::to('musics/'.$music_value->id)}}">{!! $music_value->original_filename !!}</a></td>
								<td>{!! $music_value->mime !!}</td>
								<td>{!! $music_value->filename !!}</td>
								<td>{!! $music_value->artist !!}</td>
								<td>{!! $music_value->singer !!}</td>
								<td>{!! $music_value->type !!}</td>
								<td>{!! $music_value->year !!}</td>
								<td>{!! $music_value->country !!}</td>
								<!-- edit the artist -->
								<td style="text-align: center;">
									<a href="{{URL::to('musics/'.$music_value->id.'/edit')}}">Edit</a>
								</td>
								<!-- detele the artist -->
								<td style="text-align: center;">
									{{Form::open(array('url'=>'musics/'.$music_value->id))}}
										{{ method_field('delete') }}
										{{Form::hidden('method','DELETE')}}
										{{Form::submit('Delete')}}
									{{Form::close()}}
								</td>
								<td style="text-align: center;">
									<a href="{{ URL ::to('musics/'.$music_value->id)}}" target="_blank">Play</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{!! $v_music->render() !!}
			</div>
		</div>
	</div>
</body>
</html>
@stop
