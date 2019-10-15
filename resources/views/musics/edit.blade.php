@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="thumbnail">
					<!--  Kiem tra co insert_task_message hay khong -->
					@if(Session::has('update_task_message'))
					<div>
						<h3>{{Session::get('update_task_message')}}</h3>
					</div>
					@endif
					{!! Form::model($v_music,array('route'=>array('musics.update',$v_music->id),'method'=>'PUT')) !!}
					 		<div class="row">
					 			<div class="col-md-3">
					 				{!! Form::label('filename','Filename') !!}
					 			</div>
					 			<div class="col-md-5" ">
					 				{!! Form::text('original_filename') !!}
					 			</div>
					 		</div>
					 		<div class="row">
					 			<div class="col-md-3">
					 				{!! Form::label('mime','Mime') !!}
					 			</div>
					 			<div class="col-md-5">
					 				{!! Form::text('mime') !!} <br />
					 			</div>
					 		</div>
					 		<div class="row">
					 			<div class="col-md-3">
					 				{!! Form::label('original_filename','Original_filename') !!}
					 			</div>
					 			<div class="col-md-5">
					 				{!! Form::text('filename') !!} <br />
					 			</div>
					 		</div>
					 		<div class="row">
					 			<div class="col-md-3">
					 				{!! Form::label('artist','Artist') !!}
					 			</div>
					 			<div class="col-md-5" ">
					 				{!! Form::text('artist') !!}
					 			</div>
					 		</div>
					 		<div class="row">
					 			<div class="col-md-3">
					 				{!! Form::label('singer','Singer') !!}
					 			</div>
					 			<div class="col-md-5" ">
					 				{!! Form::text('singer') !!}
					 			</div>
					 		</div>
					 		<div class="row">
					 			<div class="col-md-3">
					 				{!! Form::label('type','Type') !!}
					 			</div>
					 			<div class="col-md-5" ">
					 				{!! Form::text('type') !!}
					 			</div>
					 		</div>
					 		<div class="row">
					 			<div class="col-md-3">
					 				{!! Form::label('year','Year') !!}
					 			</div>
					 			<div class="col-md-5" ">
					 				{!! Form::text('year') !!}
					 			</div>
					 		</div>
					 		<div class="row">
					 			<div class="col-md-3">
					 				{!! Form::label('country','Country') !!}
					 			</div>
					 			<div class="col-md-5" ">
					 				{!! Form::text('country') !!}
					 			</div>
					 		</div>
					  		<hr>
					  		<div class="row">
					  			<div class="col-md-2">
					  				{!! Form::submit('Save song')!!}
					  			</div>
					  			<div class="col-md-2">
					  				<h3 style="text-align: center;margin: 0px;"><a href="{!!route('musics.index',['$musics->id'])!!}">Back</a></h3>
					  			</div>
					  		</div>
					{!!Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop
