@extends('layouts.front')

@section('heading',"Creat Threed")
	
@section('content')
	
	<div class="row">
		<div class="well">
			<form action="{{route('threed.store')}}" class="form-verical" method="post" role="form" id="create-threed-form">
				{{csrf_field()}}
				<div class="form-group">
					<label for="subject">Subject</label>
					<input type="text" class="form-control" name="subject" value="{{old('subject')}}">
				</div>
				<div class="form-group">
					<label for="type">Type</label>
					<input type="text" class="form-control" name="type" value="{{old('type')}}">
				</div>
				<div class="form-group">
					<label for="threed">Threed</label>
					<textarea type="text" class="form-control" name="threed" value="{{old('threed')}}"></textarea>
				</div>
				<div class="form-group">
					{!! app('captcha')->display(); !!}
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
@endsection