@extends('layouts.front')

@section('content')
<div class="content-wrap well">
<h4>{{$threed->subject}}</h4>
<div class="threed-detalis">
	{{$threed->threed}}
</div>
<br>

@if(auth()->user()->id == $threed->user_id)
<div class="actions">
	<a href="{{route('threed.edit',$threed->id)}}" class="btn btn-info btn-xs">Edit</a>

	<form action="{{route('threed.destroy',$threed->id)}}" method="post" class="inline-it">
		{{csrf_field()}}
		{{method_field('DELETE')}}
		<button type="submit" class="btn btn-danger btn-xs">Delete</button>
	</form>
</div>
@endif

</div>
<hr><br>
{{-- Answer/comment --}}

   @foreach($threed->comments as $comment)
   <div class="comment well well-lg">
   		
		<h4>{{$comment->body}}</h4>
		<lead>{{$comment->user->name}}</lead>	

		<div class="actions">
			
			<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$comment->id}}">Edit</button>
	
			 <!-- Modal -->
			 <div id="{{$comment->id}}" class="modal" role="dialog">
			   <div class="modal-dialog">

			     <!-- Modal content-->
			     <div class="modal-content">
			       <div class="modal-header">
			         <button type="button" class="close" data-dismiss="modal">&times;</button>
			         <h4 class="modal-title">Modal Header</h4>
			       </div>
			       <div class="modal-body">
			         	<div class="comment-form">
			         		<form action="{{route('comment.update',$comment->id)}}" method="post" role="form">
			         			{{csrf_field()}}
			         			{{method_field("PUT")}}
			         			<legend>Edit comment</legend>
			         			<div class="form-group">
			         				<input type="text" class="form-control" name="body" value="{{$comment->body}}">
			         			</div>
			         			<button type="submit" class="btn btn-primary">Comment</button>
			         		</form>
			         	</div>
			       </div>
			       <div class="modal-footer">
			         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			       </div>
			     </div>

			   </div>
			 </div>
			
			{{-- delete --}}

			<form action="{{route('comment.destroy',$comment->id)}}" method="post" class="inline-it">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<button type="submit" class="btn btn-danger btn-xs">Delete</button>
			</form>
		</div>
	</div>	
	<br>
{{-- replay comment --}}
	@foreach($comment->comments as $replay)
		<div class="small well text-info replay-form" style="margin-left: 40px">
			<p>{{$replay->body}}</p>
			<lead>by {{$replay->user->name}}</lead>	
			<div class="actions">
			
			<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$replay->id}}">Edit</button>
	
			 <!-- Modal -->
			 <div id="{{$replay->id}}" class="modal" role="dialog">
			   <div class="modal-dialog">

			     <!-- Modal content-->
			     <div class="modal-content">
			       <div class="modal-header">
			         <button type="button" class="close" data-dismiss="modal">&times;</button>
			         <h4 class="modal-title">Modal Header</h4>
			       </div>
			       <div class="modal-body">
			         	<div class="comment-form">
			         		<form action="{{route('comment.update',$replay->id)}}" method="post" role="form">
			         			{{csrf_field()}}
			         			{{method_field("PUT")}}
			         			<legend>Edit comment</legend>
			         			<div class="form-group">
			         				<input type="text" class="form-control" name="body" value="{{$replay->body}}">
			         			</div>
			         			<button type="submit" class="btn btn-primary">Replay</button>
			         		</form>
			         	</div>
			       </div>
			     </div>

			   </div>
			 </div>
			
			{{-- delete --}}

			<form action="{{route('comment.destroy',$replay->id)}}" method="post" class="inline-it">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<button type="submit" class="btn btn-danger btn-xs">Delete</button>
			</form>
		</div>
		</div>
	
		{{-- replay-form	 --}}
		
		
	@endforeach
	<div class="comment-form">
			<form action="{{route('replaycomment.store',$comment->id)}}" method="post" role="form">
				{{csrf_field()}}
				<legend>Creat replay</legend>
				<div class="form-group">
					<input type="text" class="form-control" name="body">
				</div>
				<button type="submit" class="btn btn-primary">Replay</button>
			</form>
		</div>
	
  @endforeach
	

<div class="comment-form">
	<form action="{{route('threedcomm.store',$threed->id)}}" method="post" role="form">
		{{csrf_field()}}
		<legend>Creat comment</legend>
		<div class="form-group">
			<input type="text" class="form-control" name="body">
		</div>
		<button type="submit" class="btn btn-primary">Comment</button>
	</form>
</div>



@endsection