@extends('layouts.master')

@section('header')

	@include('partials._managerNav')

@stop

@section('content')

	<h5>Welcome to Equality and Diversity, {{ $currentUser->first_name . ' ' . $currentUser->last_name }}</h5>

	<a class="btn right" href="{{ URL::route('test.showStart') }}">

		@if (Helpers\TestAction::hasUnfinished($currentUser))

			continue test

		@else

			take test 

		@endif

		<i class="mdi-device-now-widgets right"></i>

	</a>


	<div class="divider"></div>

	<p class="attempts small-text right"> {{ 3 - Helpers\TestAction::attemptsCount($currentUser) }} attempts left</p>

	

@stop