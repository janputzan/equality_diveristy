@extends('layouts.master')

@section('header')

	@include('partials._adminNav')

@stop

@section('content')

	<h5>Add Question</h5>
	<div class="divider"></div>

	@include('partials._addQuestion')

@stop