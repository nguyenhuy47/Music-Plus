@extends('layout')
@section('content')
	<div class="container">
		<!--  Kiem tra co insert_task_message hay khong -->
		@if(Session::has('insert_task_message'))
		<div>
			{{Session::get('insert_task_message')}}
		</div>
		@endif
		<div class="row">
			<div class="col-md-4">
				<div class="thumbnail">
					{!! Form::open(['route'=>'artists.store']) !!}
						<div class="row">
							<div class="col-md-3">
								{!! Form::label('name','Name') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('name') !!} <br />
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								{!! Form::label('birthday','Birthday') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('birthday') !!} <br />
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								{!! Form::label('country','Country') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('country') !!} <br />
							</div>
						</div>
						<hr>
				 		<div class="row">
				 			<div class="col-md-4">
				 				{!! Form::submit('Insert Artist')!!}
				 			</div>
				 			<div class="col-md-4">
				 				<h3 style="text-align: center;margin: 0px;"><a href="{!!route('artists.index',['$artists->id'])!!}">Back</a></h3>
				 			</div>
				 		</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop