@extends ('layout')
@section('content')
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<meta charset="UTF-8">
	</head>
	<body>
		<div class="container">
			@if(Session::has('delete_task_message'))
			<div>
				{{Session::get('delete_task_message')}}
			</div>
			@endif
			<div class="row">
				<div class="col-md-9">
					<table class="table table-bordered " style="border: ridge;">
						<thead>
							<tr >
								<td colspan="7" style="text-align: center;color: blue;font-weight: bold;background-color: #CAFF70;"> ARTIST LIST</td>
							</tr>
							<tr>
								<th style="text-align: center;">ID</th> 
								<th style="text-align: center;">NAME</th> 
								<th style="text-align: center;">BIRTHDAY</th> 
								<th style="text-align: center;">COUNTRY</th>
								<th style="text-align: center;">SHOW</th> 
								<th style="text-align: center;">EDIT</th> 
								<th style="text-align: center;">DELETE</th>
							</tr>
						</thead>
						<tbody>
							@foreach  ($v_artist as $_artist =>$artist_value) 
								<tr>
									<td style="text-align: center;">{!! $artist_value->id !!}</td>
									<td>{!! $artist_value->name !!}</td>
									<td style="text-align: center;">{!! $artist_value->birthday !!}</td>
									<td>{!! $artist_value->country !!}</td>
									<!-- show the artist -->
									<td style="text-align: center;">
										<a href="{{ URL ::to('artists/'.$artist_value->id)}}" target="_blank">Show</a>
									</td>
									<!-- edit the artist -->
									<td style="text-align: center;">
										<a href="{{URL::to('artists/'.$artist_value->id.'/edit')}}">Edit</a>
									</td>
									<!-- detele the artist -->
									<td style="text-align: center;">
										{{Form::open(array('url'=>'artists/'.$artist_value->id))}}
											{{ method_field('delete') }}
											{{Form::hidden('method','DELETE')}}
											{{Form::submit('Delete')}}
										{{Form::close()}}
									</td>
								</tr>
							@endforeach 
						</tbody>
					</table>
					{!! $v_artist->render() !!}
				</div>
				<div class="col-md-3">
					<div class="thumbnail">
						<div class="caption">
							<h4 style="text-align: center;color: blue;"><a href="{{URL::to('artists/create')}}">INSERT NEW ARTIST</a></h4>
							<hr>
						</div>
					</div>
				</div>
			</div> <!-- End_row -->
		</div> <!-- End_container -->
	</body>
	</html>
@stop