@extends('layouts.master')

@section('header')

	<nav>

		<div class="container helper">
		
			<a href="#"><span><h5>Equality and Diversity</h5></span></a>

		</div>

	</nav>
@stop

@section('content')

		<div class="row">
		
			<div class="col s12 m8 l6 offset-m1 offset-l3">

				@include('partials._login')

			</div>

		</div>
		
@stop
