@extends('layouts.master')

@section('header')

	@include('partials._testNav')

@stop

@section('content')

	<div id="after-start">

		<h5>Question <span id="questions-count">1</span> out of <span id="questions-total">27</span></h5>

		<div class="divider"></div>

		<div class="progress container">

			<div class="indeterminate"></div>

		</div>

		<div class="question-container">

			<div id="test-question-body"></div>

			<div class="answers-container">
				
				<ul class="collection" id="answers-list">
					
				</ul>

			</div>

			<div class="controls-container">

				<button class="waves-effect waves-light btn controls" id="get-prev-question" data-action="{{URL::route('test.nextQuestion')}}">previous</button>

				<button class="waves-effect waves-light btn controls" id="get-next-question" data-action="{{URL::route('test.nextQuestion')}}">next</button>
				<button class="waves-effect waves-light btn controls" id="skip-question" data-action="{{URL::route('test.nextQuestion')}}">skip</button>

				<button class="waves-effect waves-light btn controls right" id="save-test" data-action="{{URL::route('test.nextQuestion')}}">save progress</button>

			</div>

		</div>

	</div>

	<div id="before-start">

		<h5>Whenever you are ready...</h5>

		<div class="divider"></div>

	
		<div class="start-test-container">

			<button class="waves-effect waves-light btn-large controls" id="start-test" data-action="{{URL::route('test.startTest')}}">start the test</button>

		</div>

	</div>

	<div id="test-finished">

		<h5>Your result is <span id="total-right"></span> out of 27 right.</h5>

		<div class="divider"></div>

		<div class="start-test-container">

			<a class="waves-effect waves-light btn-large controls" id="go-back" href="{{URL::route('user.dashboard')}}">back to dashboard</a>

		</div>

	</div>

@stop