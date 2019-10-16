@extends('layout')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="thumbnail">
					<!--  Kiem tra co insert_task_message hay khong -->
					@if(Session::has('update_task_message'))
					<div>
						{{Session::get('update_task_message')}}
					</div>
					@endif
					{!! Form::model($v_artist,array('route'=>array('artists.update',$v_artist->id),'method'=>'PUT')) !!}
					 		<div class="row">
					 			<div class="col-md-3">
					 				{!! Form::label('name','Name') !!}
					 			</div>
					 			<div class="col-md-4">
					 				{!! Form::text('name') !!} 
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
					  				{!! Form::submit('Save Artist')!!}
					  			</div>
					  			<div class="col-md-2">
					  				<h3 style="text-align: center;margin: 0px;"><a href="{!!route('artists.index',['$artists->id'])!!}">Back</a></h3>
					  			</div>
					  		</div>
					{!!Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop