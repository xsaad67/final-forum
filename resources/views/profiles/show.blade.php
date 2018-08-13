@extends('layouts.app')

@section('content')
	
	<div class="container">
		<h2 class="page-header">{{$profileUser->name}} <span class="lead">Since {{$profileUser->created_at->diffForHumans()}}</span></h2> 
		<hr>

		<h3 class="text-center">All Threads</h3>

		@foreach($profileUser->activities as $activity)
		  @include('profiles.activities.'.$activity->type)
		@endforeach


	</div>



@endsection