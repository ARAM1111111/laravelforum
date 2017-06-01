@extends('layouts.front')

@section('banner')
	<div class="jumbotron">
	    <div class="container">
	        <h1>Join my site</h1>
	        <p>Help and get help</p>
	        <p><a class="btn btn-primary btn-lg">Learn more</a></p>
	    </div>  
	</div>
@endsection

@section('heading','Threeds')
@section('content')
	@include('threed.partials.threed-list')	
@endsection
