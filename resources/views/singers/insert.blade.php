@extends('layouts.app')
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
					{!! Form::open(['route'=>'singers.store']) !!}
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
								{!! Form::label('Birthday','Birthday') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('birthday') !!} <br />
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								{!! Form::label('Height','Height') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('height') !!} <br />
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								{!! Form::label('Weight','Weight') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('weight') !!} <br />
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								{!! Form::label('Type','Type') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('type') !!} <br />
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								{!! Form::label('Country','Country') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('country') !!} <br />
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								{!! Form::label('Hoppy','Hoppy') !!}
							</div>
							<div class="col-md-4">
								{!! Form::text('hoppy') !!} <br />
							</div>
						</div>
						<hr>
				 		<div class="row">
				 			<div class="col-md-4">
				 				{!! Form::submit('Insert Artist')!!}
				 			</div>
				 			<div class="col-md-4">
				 				<h3 style="text-align: center;margin: 0px;"><a href="{!!route('singers.index',['$singers->id'])!!}">Back</a></h3>
				 			</div>
				 		</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop
