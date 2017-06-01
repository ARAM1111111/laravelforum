@extends('layouts.front')

@section('heading',"Creat Threed")
	
@section('content')
	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $err)
					<li>{{$err}}</li>
				@endforeach
			</ul>
		</div>
	@endif

	@if(session('message'))
		<div class="alert alert-success">
			{{session('message')}}
		</div>
	@endif
	<div class="row">
		<div class="well">
			<form action="{{route('threed.update',$threed->id)}}" class="form-verical" method="post" role="form" id="create-threed-form">
				{{csrf_field()}}
				{{method_field('PUT')}}
				<div class="form-group">
					<label for="subject">Subject</label>
					<input type="text" class="form-control" name="subject" value="{{$threed->subject}}">
				</div>
				<div class="form-group">
					<label for="type">Type</label>
					<input type="text" class="form-control" name="type" value="{{$threed->type}}">
				</div>
				<div class="form-group">
					<label for="threed">Threed</label>
					<textarea type="text" class="form-control" name="threed" value="{{$threed->threed}}"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
@endsection