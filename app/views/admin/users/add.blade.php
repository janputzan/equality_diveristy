@extends('layouts.master')

@section('header')

	@include('partials._adminNav')

@stop

@section('content')

	<h5>Add Users</h5>
	<div class="divider"></div>

	<div class="progress container">

		<div class="indeterminate"></div>

	</div>

	@if (count($departments) > 0)

		@include('partials._addUser')

	@else

		Please <a href=" {{ URL::route('admin.departments.add') }} ">add departments</a> first.

	@endif

@stop