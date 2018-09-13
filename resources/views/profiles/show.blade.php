@extends('layouts.app')

@section('content')
	
	<div class="container">
		<h2 class="page-header">{{$profileUser->name}} </h2> 
		<hr>

		@foreach($activites as $date => $activity)
		  <h3 class="text-center">{{$date}}</h3>
		
		@foreach($activity as $record)
			@include('profiles.activities.'.$record->type)
		@endforeach

		@endforeach


	</div>



@endsection