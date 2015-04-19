@extends('layouts.master')

@section('header')

	@include('partials._managerNav')

@stop

@section('content')

	<h5>Add Users</h5>
	<div class="divider"></div>

	<div class="progress container">

		<div class="indeterminate"></div>

	</div>

		@include('partials._addUserMan')

@stop