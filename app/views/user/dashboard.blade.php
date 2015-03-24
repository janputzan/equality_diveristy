@extends('layouts.master')

@section('header')

	@include('partials._userNav')

@stop

@section('content')

	<h5>Welcome to Equality and Diversity, {{ $currentUser->first_name . ' ' . $currentUser->last_name }}</h5>

	<a class="btn right" href="{{ URL::route('test.showStart') }}">take test <i class="mdi-device-now-widgets right"></i></a>


	<div class="divider"></div>

	<p class="attempts small-text right"> {{ ( 3 - $currentUser->tests->count()) }} attempts left</p>

	<div class="valign-wrapper">

		@if ($currentUser->tests->count() == 0)

			<p class="valign">No results to show. Please take a test by clicking the Take Test button</p>

		@endif

	</div>

@stop