	<div class="list-group">
		@forelse($threeds as $threed)
			<div class="list-group">
				<a href="{{route('threed.show',$threed->id)}}" class="list-group-item">
					<h4 class="list-group-item-heading">{{$threed->subject}}</h4>
					<p class="list-group-item-text">{{str_limit($threed->threed,100)}}</p>
				</a>
				
			</div>
		@empty
			<h5>No treads</h5>
		@endforelse
	</div>