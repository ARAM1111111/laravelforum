<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Web forum</title>
	<link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
@include('layouts.partial.navbar')
	@yield('banner')
<div class="container">
	
	<div class="row">
		<div class="col-md-3">
			<h4>Category</h4>
			<ul class="list-group">
				<a href="{{route('threed.index')}}" class="list-group-item">
					<span class="badge">14</span>
					All threeds
				</a>
				<a href="#" class="list-group-item">
					<span class="badge">2</span>
					PHP
				</a>
				<a href="#" class="list-group-item">
					<span class="badge">5</span>
					PHP
				</a>
			</ul>
		</div>
		<div class="col-md-9">
			<h4 class="main-content-heading">@yield('heading')</h4>
			<div class="content-wrap">
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
			@yield('content')
			</div>
		</div>
	</div>
	
</div>


<!-- Jquery -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>