@extends('layouts.master')

@section('header')

	@include('partials._testNav')

@stop

@section('content')

	<div id="after-start">

		<h5>Question <span id="questions-count">{{ $count }}</span> out of <span id="questions-total">27</span></h5>

		<span id="category-name">{{ $question->characteristic->name }}</span>

		<div class="divider"></div>

		<div class="progress container">

			<div class="indeterminate"></div>

		</div>

		<div class="question-container">

			<div id="test-question-body" data-question="{{$question->id}}">{{ $question->body }}</div>

			<div class="answers-container">

				
				<ul class="collection" id="answers-list">

					@foreach ($question->answers as $answer)

						<li class="collection-item" data-answer="{{$answer->id}}">{{ $answer->body }}</li>

					@endforeach
					
				</ul>
				@include('partials._preloaderCircle')

			</div>

			<div class="controls-container">

				<button disabled class="waves-effect waves-light btn controls" id="get-prev-question" data-action="{{URL::route('test.nextQuestion')}}">previous</button>

				<button disabled class="waves-effect waves-light btn controls" id="get-next-question" data-action="{{URL::route('test.nextQuestion')}}">next</button>
				<button disabled class="waves-effect waves-light btn controls" id="skip-question" data-action="{{URL::route('test.nextQuestion')}}">skip</button>

				<button disabled class="waves-effect waves-light btn controls right" id="save-test" data-action="{{URL::route('test.nextQuestion')}}">save progress</button>

			</div>

		</div>

	</div>

	<div id="test-finished" class="modal">

		<div class="modal-content">

			<p>You have finished the test. Your result is <span id="test-result"></span> out of 27 right.</p>

			<p>You can see more datailed information on your dashboard</p>

		</div>

		<div class="modal-footer">

			<a class="waves-effect waves-light btn" href="{{URL::route('home')}}">Back to Dashboard</a>
			
		</div>

	</div>

@stop

@section('scripts')

	{{ HTML::script('assets/js/test.js') }}

@stop