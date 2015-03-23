@extends('layouts.master')

@section('header')

	@include('partials._adminNav')

@stop

@section('content')

	<h5>Add Question</h5>
	<div class="divider"></div>

	<div class="progress">

		<div class="indeterminate"></div>

	</div>

	@include('partials._addQuestion')
	@include('partials._addAnswers')

@stop