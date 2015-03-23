@extends('layouts.master')

@section('header')

	<div class="container">

		<h5>Equality and Diversity</h5>

	</div>
@stop

@section('content')

		<div class="row activate">
			
			<div class="col s12 m8 l6 offset-m1 offset-l3">

				<p>{{$user->first_name}}, please create your password.</p>

			</div>
			
		</div>

		<div class="row">
		
			<div class="col s12 m8 l6 offset-m1 offset-l3">

				@include('partials._password')

			</div>

		</div>
		
@stop