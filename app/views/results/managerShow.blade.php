@extends('layouts.master')

@section('scripts')

	<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
	{{HTML::script('assets/js/graphs.js')}}

@stop

@section('header')

	@include('partials._managerNav')

@stop

@section('content')

	<div class="row graph-container">


		<div class="col l4 m4 s4">

			<span class="center-align">Active and Invited Users</span>

			<canvas id="results-graph_0" width="200" height="200"></canvas>

		</div>
		<div class="col l4 m4 s4">

			<span class="center-align">Attempted Test Users</span>

			<canvas id="results-graph_1" width="200" height="200"></canvas>

		</div>
		<div class="col l4 m4 s4">

			<span class="center-align">Passed and Failed Users</span>

			<canvas id="results-graph_2" width="200" height="200"></canvas>

		</div>

	</div>

	<div class="table-container">

		<table class="striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Attempts</th>
					<th>Best Score</th>
					<th>Average Score</th>
					<th>Pass / Fail</th>
				</tr>
			</thead>

			<tbody>
				@foreach($listOfUsers as $user)

					<!-- @if($user->tests->count()) -->

						<tr>
							<td>
								{{ $user->first_name.' '.$user->last_name }}
							</td>
							<td>
								{{ Helpers\TestAction::attemptsCount($user) }}
							</td>
							<td>
								{{ round((Helpers\Result::getBestScore($user)/27)*100)}}%
							</td>
							<td>
								{{ round((Helpers\Result::getAverageScore($user)/27)*100)}}%
							</td>
							<td>
								@if (Helpers\Result::hasPassed($user))

									<span class="pass"><i class="small mdi-action-thumb-up"></i></span>

								@else

									<span class="fail"><i class="small mdi-action-thumb-down"></i></span>

								@endif
							</td>
						</tr>

					<!-- @endif -->

				@endforeach
			</tbody>
		</table>

		<div class="navigation"> {{ $listOfUsers->links() }} </div>

	</div>

	

@stop