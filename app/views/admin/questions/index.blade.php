@extends('layouts.master')

@section('header')

	@include('partials._adminNav')

@stop

@section('content')

	<div class="row">
			
		<h5>Questions</h5> 

		<a class="btn right" href="{{ URL::route('admin.questions.add') }}">Add New<i class="mdi-content-add"></i></a>
			
		<div class="divider"></div>

	</div>

	<div class="row">

		<div class="col s2 m3 l3">

			<ul class="collection with-header">

				@foreach ($characteristics as $characteristic)

					<li class="collection-item characteristic"><a href="?characteristic={{$characteristic->id}}">{{ $characteristic->name }}</a></li>

				@endforeach
			</ul>

		</div>

		<div class="col s10 m9 l9">

			<ul class="collapsible" data-collapsible="accordion">

				@foreach ($questions as $question)

					<li class="question">
					
						<div class="collapsible-header">{{ $question->body }}<i class="mdi-action-settings right"></i></div>

						<div class="collapsible-body">

							<ul class="collection">

								@foreach($question->answers as $answer)

									<li class="collection-item answer">

										{{$answer->body}}

										@if ($answer->isRight())

											<i class="mdi-action-done right"></i>

										@endif

									</li>

								@endforeach

							</ul>

						</div>

					</li>

				@endforeach

			</ul>

		</div>

	</div>		



	

@stop