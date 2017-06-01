@extends('layouts.front')

@section('heading')
<a href="{{route('threed.create')}}" class="btn btn-primary pull-right">Create Threed</a>
@endsection


@section('content')
	<h2>Threads</h2>
	@include('threed.partials.threed-list')	
@endsection
