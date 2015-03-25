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

		<div class="start-test-container row">

			<!-- <ul class="collection" id="results-list"></ul> -->

				<div class="col s2 m3 l3">

					<ul class="collection with-header">

						@foreach ($characteristics as $characteristic)

							<li class="collection-item characteristic"><a href="#">{{ $characteristic->name }}</a></li>

						@endforeach
					</ul>

				</div>

				<div class="col s10 m9 l9">

					<ul class="collapsible border-bottom collection" id="results-list" data-collapsible="accordion">

							<!-- <li class="question collection-item">
								<div class="collapsible-header">???</div>
								<div class="collapsible-body">
									<ul class="collection answers">
										<li class="collection-item answer">???<i class="mdi-action-done right"></i></li>
									</ul>
								</div>
							</li> -->
					</ul>

				</div>

			</div>

			<a class="waves-effect waves-light btn-large controls" id="go-back" href="{{URL::route('user.dashboard')}}">back to dashboard</a>

		</div>

	</div>

@stop